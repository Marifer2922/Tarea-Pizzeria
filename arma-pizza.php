<?php
// Configuración propia del módulo 3: no modifica ni requiere datos.php.
$masas = [
    "tradicional" => ["nombre" => "Tradicional italiana", "recargo" => 0],
    "delgada" => ["nombre" => "Delgada / Crocante", "recargo" => 0],
    "rellena" => ["nombre" => "Orilla rellena de queso", "recargo" => 35]
];
$salsas = ["pomodoro" => "Pomodoro clásica", "alfredo" => "Salsa blanca Alfredo", "pesto" => "Pesto genovés", "barbacoa" => "Barbacoa dulce"];
$quesos = ["mozzarella" => "Mozzarella fresco", "parmesano" => "Queso parmesano reggiano", "provolone" => "Queso provolone"];
$extras = [
    "pepperoni" => ["nombre" => "Pepperoni", "precio" => 25],
    "jamon" => ["nombre" => "Jamón de pavo", "precio" => 22],
    "champinones" => ["nombre" => "Champiñones frescos", "precio" => 20],
    "pimientos" => ["nombre" => "Pimientos morrones", "precio" => 18],
    "aceitunas" => ["nombre" => "Aceitunas negras", "precio" => 18],
    "albahaca" => ["nombre" => "Albahaca fresca", "precio" => 12],
    "tocineta" => ["nombre" => "Tocineta ahumada", "precio" => 28],
    "carne" => ["nombre" => "Carne molida artesanal", "precio" => 30]
];
$preciosPersonalizada = ["personal" => 110, "mediana" => 175, "familiar" => 240, "gigante" => 310];

function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
$tamanos = ['personal' => 'Personal (8")', 'mediana' => 'Mediana (12")', 'familiar' => 'Familiar (16")', 'gigante' => 'Gigante (20")'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Arma tu pizza | Pizzería Bella Napoli</title>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Mostrar u ocultar el menú">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="menu.php">Menú</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="arma-pizza.php">Arma tu pizza</a></li>
                        <li class="nav-item"><a class="nav-link" href="pedido.php">Pedido</a></li>
                        <li class="nav-item"><a class="nav-link" href="sucursales.php">Sucursales</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container mt-4 mb-5">
            <h1 class="titulo">Arma tu pizza</h1>
            <p class="lead">Elige el tamaño, la masa, tu salsa favorita, el queso y los ingredientes adicionales. Lleva tu creación al checkout para confirmar tu pedido.</p>
            <div class="row g-4 align-items-start">
                <div class="col-lg-5"><img src="img/horno.jpg" class="img-fluid rounded shadow-sm" alt="Horno tradicional para pizzas artesanales"><div class="alert alert-light mt-3">Todos los precios están expresados en lempiras. Se calcularán los impuestos y descuentos en el checkout.</div></div>
                <div class="col-lg-7"><form action="pedido.php" method="GET" class="card shadow-sm border-0"><div class="card-body p-4">
                    <input type="hidden" name="producto" value="personalizada">
                    <div class="mb-3"><label class="form-label" for="tamano">Tamaño de pizza</label><select class="form-select" name="tamano" id="tamano" required>
                    <?php foreach ($tamanos as $clave => $etiqueta): ?><option value="<?php echo e($clave); ?>" data-precio="<?php echo $preciosPersonalizada[$clave]; ?>"><?php echo e($etiqueta); ?> — L. <?php echo number_format($preciosPersonalizada[$clave], 2); ?></option><?php endforeach; ?>
                    </select></div>
                    <fieldset class="mb-3"><legend class="fs-6 fw-semibold">Tipo de masa</legend>
                    <?php foreach ($masas as $clave => $item): ?><div class="form-check"><input class="form-check-input" type="radio" name="masa" id="masa_<?php echo e($clave); ?>" value="<?php echo e($clave); ?>" data-precio="<?php echo $item['recargo']; ?>" <?php echo $clave === 'tradicional' ? 'checked' : ''; ?>><label class="form-check-label" for="masa_<?php echo e($clave); ?>"><?php echo e($item['nombre']); ?><?php if ($item['recargo']): ?> (+ L. <?php echo number_format($item['recargo'], 2); ?>)<?php endif; ?></label></div><?php endforeach; ?></fieldset>
                    <div class="row"><div class="col-md-6 mb-3"><label for="salsa" class="form-label">Salsa base</label><select class="form-select" name="salsa" id="salsa"><?php foreach ($salsas as $clave => $etiqueta): ?><option value="<?php echo e($clave); ?>"><?php echo e($etiqueta); ?></option><?php endforeach; ?></select></div>
                    <div class="col-md-6 mb-3"><label for="queso" class="form-label">Queso principal</label><select class="form-select" name="queso" id="queso"><?php foreach ($quesos as $clave => $etiqueta): ?><option value="<?php echo e($clave); ?>"><?php echo e($etiqueta); ?></option><?php endforeach; ?></select></div></div>
                    <fieldset><legend class="fs-6 fw-semibold">Ingredientes adicionales</legend><div class="row g-2">
                    <?php foreach ($extras as $clave => $item): ?><div class="col-sm-6"><div class="form-check"><input class="form-check-input" type="checkbox" name="extras[]" id="extra_<?php echo e($clave); ?>" value="<?php echo e($clave); ?>" data-precio="<?php echo $item['precio']; ?>"><label class="form-check-label" for="extra_<?php echo e($clave); ?>"><?php echo e($item['nombre']); ?> <span class="text-muted">(+ L. <?php echo number_format($item['precio'],2); ?>)</span></label></div></div><?php endforeach; ?>
                    </div></fieldset>
                    <div class="row mt-4 align-items-end"><div class="col-sm-5"><label for="cantidad" class="form-label">Cantidad</label><input class="form-control" type="number" name="cantidad" id="cantidad" value="1" min="1" max="99" required></div><div class="col-sm-7"><p class="mb-0">Subtotal estimado (sin impuestos): <strong id="estimado">L. 110.00</strong></p></div></div>
                    <button type="submit" class="btn btn-ordenar btn-lg w-100 mt-4">Continuar al pedido</button>
                </div></form></div>
            </div>
            <script>
                (function(){const f=document.querySelector('form[action="pedido.php"]'),salida=document.getElementById('estimado');
                function actualizar(){const tam=f.querySelector('#tamano option:checked');const masa=f.querySelector('input[name="masa"]:checked');const extras=f.querySelectorAll('input[name="extras[]"]:checked');let n=Number(tam.dataset.precio)+Number(masa.dataset.precio);extras.forEach(x=>n+=Number(x.dataset.precio));const cantidad=Math.max(1,Math.min(99,Number(f.querySelector('#cantidad').value)||1));salida.textContent='L. '+(n*cantidad).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2});}f.addEventListener('input',actualizar);f.addEventListener('change',actualizar);actualizar();})();
            </script>
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
                        <p class="small">Lunes a jueves: 11:00 a.m. - 9:00 p.m.<br> Viernes y sábado: 11:00 a.m. - 11:00 p.m.<br> Domingo: 12:00 m. - 8:00 p.m.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h2 class="h6">Redes sociales</h2>
                        <p class="small">Facebook: Bella Napoli HN<br> Instagram: @bellanapoli.hn</p>
                    </div>
                </div>
                <hr>
                <p class="text-center small mb-0">&copy; <?php echo date("Y"); ?> Pizzería Bella Napoli. Todos los derechos reservados.</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
