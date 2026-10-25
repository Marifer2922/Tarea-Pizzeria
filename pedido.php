<?php
    session_start();

    require_once "datos.php";

    const TASA_ISV       = 0.15;
    const DESC_VOLUMEN   = 0.10;
    const MIN_PARA_DESC  = 3;
    const COSTO_DELIVERY = 45.00;
    const FOLIO_INICIAL  = 74820;

    function e($texto) {
        return htmlspecialchars((string)$texto, ENT_QUOTES, "UTF-8");
    }

    $tamanos = ["personal" => "Personal (8\")", "mediana" => "Mediana (12\")", "familiar" => "Familiar (16\")", "gigante" => "Gigante (20\")",];

    $entregas = ["restaurante" => "Para comer en restaurante", "pickup" => "Para llevar (Pick-Up)", "delivery" => "Envío a domicilio (Delivery)",];

    $pagos = ["efectivo" => "Efectivo", "tarjeta" => "Tarjeta de crédito / débito", "transferencia" => "Transferencia ACH",];

    $categoriasPizza = ["Pizzas Clásicas", "Pizzas Gourmet de la Casa"];


    $productos = [];
    $idProducto = 1;
    foreach ($menu as $categoria => $items) {
        foreach ($items as $item) {
            $productos[$idProducto] = [
                "categoria" => $categoria,
                "nombre"    => $item["nombre"],
                "precios"   => $item["precios"],
                "es_pizza"  => in_array($categoria, $categoriasPizza, true),
                "unico"     => count($item["precios"]) === 1, // postres y bebidas: un solo precio
            ];
            $idProducto++;
        }
    }

    $errores = [];
    $orden   = null;
    $old = [
        "nombre" => "", "rtn" => "", "telefono" => "", "correo" => "", "direccion" => "",
        "producto" => "", "tamano" => "", "cantidad" => "1", "masa" => "tradicional",
        "extras" => [], "entrega" => "", "pago" => "",
    ];

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Realiza tu pedido en Pizzería Bella Napoli con factura digital e ISV del 15%.">
        <title>Pedido | Pizzería Bella Napoli</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background-color: #fbf6ea; }
            .navbar { background-color: #9c2b23; }
            .btn-ordenar { background-color: #9c2b23; color: white; }
            .btn-ordenar:hover { background-color: #7d1f19; color: white; }
            .titulo { border-bottom: 3px solid #3f6b3a; display: inline-block; padding-bottom: 4px; margin-bottom: 20px; }
            .factura { background: #fff; border: 2px dashed #9c2b23; border-radius: 8px; padding: 24px; }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Bella Napoli</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                    aria-controls="menu" aria-expanded="false" aria-label="Mostrar u ocultar el menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Menú</a></li>
                        <li class="nav-item"><a class="nav-link" href="arma-pizza.php">Arma tu pizza</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="pedido.php">Pedido</a></li>
                        <li class="nav-item"><a class="nav-link" href="sucursales.php">Sucursales</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container mt-4 mb-5">
            <h1 class="titulo">Realiza tu pedido</h1>

                <form method="POST" action="pedido.php" novalidate>

                    <h2 class="h4 mt-2">Datos del cliente</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre y apellido</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" minlength="5" required value="<?php echo $old["nombre"]; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rtn" class="form-label">RTN (14 dígitos)</label>
                            <input type="text" class="form-control" id="rtn" name="rtn" maxlength="14" inputmode="numeric" required value="<?php echo $old["rtn"]; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono de contacto (8 dígitos)</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" maxlength="8" inputmode="numeric" required value="<?php echo $old["telefono"]; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required value="<?php echo $old["correo"]; ?>">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="direccion" class="form-label">Dirección de entrega y punto de referencia</label>
                            <textarea class="form-control" id="direccion" name="direccion" rows="2" required><?php echo $old["direccion"]; ?></textarea>
                        </div>
                    </div>

                    <h2 class="h4 mt-3">Tu pedido</h2>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="producto" class="form-label">Producto</label>
                            <select class="form-select" id="producto" name="producto" required>
                                <option value="">-- Selecciona --</option>
                                <?php
                                    $categoriaActual = null;
                                    foreach ($productos as $id => $p):
                                        if ($p["categoria"] !== $categoriaActual):
                                            if ($categoriaActual !== null) { echo "</optgroup>"; }
                                            $categoriaActual = $p["categoria"];
                                            echo "<optgroup label=\"" . e($categoriaActual) . "\">";
                                        endif;
                                ?>
                                <option value="<?php echo $id; ?>"
                                    data-unico="<?php echo $p["unico"] ? "1" : "0"; ?>"
                                    data-pizza="<?php echo $p["es_pizza"] ? "1" : "0"; ?>"
                                    <?php echo ($old["producto"] === (string)$id) ? "selected" : ""; ?>>
                                    <?php echo e($p["nombre"]); ?> (desde L. <?php echo number_format(min($p["precios"]), 2); ?>)
                                </option>
                                <?php endforeach; ?>
                                    </optgroup>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tamano" class="form-label">Tamaño</label>
                            <select class="form-select" id="tamano" name="tamano">
                                <option value="">-- Selecciona --</option>
                                <?php foreach ($tamanos as $clave => $etiqueta): ?>
                                    <option value="<?php echo $clave; ?>" <?php echo ($old["tamano"] === $clave) ? "selected" : ""; ?>>
                                        <?php echo e($etiqueta); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div id="ayudaTamano" class="form-text d-none">Este producto tiene un solo precio; no necesitas elegir tamaño.</div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" max="99" required value="<?php echo $old["cantidad"]; ?>">
                        </div>
                    </div>

                    <div id="opcionesPizza">
                        <div class="mb-3">
                            <span class="form-label d-block">Tipo de masa <small class="text-muted">(solo pizzas)</small></span>
                            <?php foreach ($masas as $clave => $m): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="masa" id="masa_<?php echo $clave; ?>" value="<?php echo $clave; ?>" <?php echo ($old["masa"] === $clave) ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="masa_<?php echo $clave; ?>">
                                        <?php echo e($m["nombre"]); ?>
                                        <?php if ($m["recargo"] > 0): ?>(+ L. <?php echo number_format($m["recargo"], 2); ?>)<?php endif; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mb-3">
                            <span class="form-label d-block">Ingredientes adicionales <small class="text-muted">(opcional, solo pizzas)</small></span>
                            <div class="row">
                                <?php foreach ($extras as $clave => $x): ?>
                                    <div class="col-md-3 col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="extras[]"
                                               id="ex_<?php echo $clave; ?>" value="<?php echo $clave; ?>"
                                               <?php echo in_array($clave, $old["extras"], true) ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="ex_<?php echo $clave; ?>">
                                                <?php echo e($x["nombre"]); ?>
                                                <small class="text-muted">(+ L. <?php echo number_format($x["precio"], 2); ?>)</small>
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <h2 class="h4 mt-3">Entrega y pago</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <span class="form-label d-block">Modalidad de entrega</span>
                            <?php foreach ($entregas as $clave => $etiqueta): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="entrega" id="ent_<?php echo $clave; ?>"
                                        value="<?php echo $clave; ?>" <?php echo ($old["entrega"] === $clave) ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="ent_<?php echo $clave; ?>">
                                        <?php echo e($etiqueta); ?>
                                        <?php if ($clave === "delivery"): ?>
                                        <small class="text-muted">(+ L. <?php echo number_format(COSTO_DELIVERY, 2); ?>)</small>
                                        <?php endif; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <span class="form-label d-block">Método de pago</span>
                            <?php foreach ($pagos as $clave => $etiqueta): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pago" id="pago_<?php echo $clave; ?>" value="<?php echo $clave; ?>" <?php echo ($old["pago"] === $clave) ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="pago_<?php echo $clave; ?>"><?php echo e($etiqueta); ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="alert alert-info small">
                        Los precios del menú no incluyen ISV: se agrega el 15% sobre el subtotal neto en la factura.
                        Si pides 3 o más pizzas recibes 10% de descuento.
                    </div>

                    <button type="submit" class="btn btn-ordenar btn-lg">Confirmar pedido</button>
                </form>

    </main>

    <footer class="bg-dark text-light pt-4 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h2 class="h5">Bella Napoli</h2>
                    <p class="small">Pizzas al horno de leña.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h2 class="h6">Horarios de cocina</h2>
                    <p class="small">Lunes a jueves: 11:00 a.m. - 9:00 p.m.<br>
                       Viernes y sábado: 11:00 a.m. - 11:00 p.m.<br>
                       Domingo: 12:00 m. - 8:00 p.m.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h2 class="h6">Redes sociales</h2>
                    <p class="small">Facebook: Bella Napoli HN<br>
                       Instagram: @bellanapoli.hn</p>
                </div>
            </div>
            <hr>
            <p class="text-center small mb-0">&copy; <?php echo date("Y"); ?> Pizzería Bella Napoli. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            var producto = document.getElementById('producto');
            var tamano   = document.getElementById('tamano');
            var ayuda    = document.getElementById('ayudaTamano');
            var opciones = document.getElementById('opcionesPizza');
            if (!producto) { return; }

            function actualizar() {
                var opt = producto.options[producto.selectedIndex];
                var unico = opt && opt.dataset.unico === '1';
                var pizza = !opt || !opt.value || opt.dataset.pizza === '1';
                tamano.disabled = unico;
                ayuda.classList.toggle('d-none', !unico);
                opciones.classList.toggle('d-none', !pizza);
            }
            producto.addEventListener('change', actualizar);
            actualizar();
        })();
    </script>
</body>
</html>