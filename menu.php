<?php

    require_once 'datos.php';

    function e($texto) {
     return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Menú de Pizzería Bella Napoli: pizzas clásicas, gourmet, calzones, postres y bebidas con precios por tamaño.">
    <title>Menú | Pizzería Bella Napoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fbf6ea; }
        .navbar { background-color: #9c2b23; }
        .card-img-top { height: 200px; object-fit: cover; }
        .titulo { border-bottom: 3px solid #3f6b3a; display: inline-block; padding-bottom: 4px; margin-bottom: 20px; }
        .tabla-precios th, .tabla-precios td { font-size: 0.8rem; text-align: center; }
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="menu.php">Menú</a></li>
                    <li class="nav-item"><a class="nav-link" href="arma-pizza.php">Arma tu pizza</a></li>
                    <li class="nav-item"><a class="nav-link" href="pedido.php">Pedido</a></li>
                    <li class="nav-item"><a class="nav-link" href="sucursales.php">Sucursales</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <h1 class="mb-1">Catálogo de especialidades</h1>
        <p class="text-muted">Precios en Lempiras (L.). El ISV del 15% se calcula al hacer el pedido.</p>




        <?php foreach ($menu as $categoria => $productos): ?>
            <section class="mb-5">
                <h2 class="titulo"><?php echo e($categoria); ?></h2>

                <div class="row">
                    
                    <?php foreach ($productos as $producto): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="<?php echo e($producto['imagen']); ?>"
                                     class="card-img-top"
                                     alt="<?php echo e($producto['alt']); ?>"
                                     title="<?php echo e($producto['nombre'] . ': ' . $producto['descripcion']); ?>"
                                     loading="lazy">
                                <div class="card-body">
                                    <h3 class="card-title h5"><?php echo e($producto['nombre']); ?></h3>
                                    <p class="card-text mb-1"><?php echo e($producto['descripcion']); ?></p>
                                    <p class="card-text small text-muted">
                                        <strong>Ingredientes:</strong> <?php echo e($producto['ingredientes']); ?>
                                    </p>

                                   
                                    <table class="table table-sm table-bordered tabla-precios mb-0">
                                        <caption class="visually-hidden">Precios de <?php echo e($producto['nombre']); ?></caption>
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <?php foreach ($producto['precios'] as $tamano => $precio): ?>
                                                    <th scope="col"><?php echo e($tamano); ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                             
                                                <?php foreach ($producto['precios'] as $tamano => $precio): ?>
                                                    <td>L. <?php echo number_format($precio, 2); ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
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
</body>
</html>