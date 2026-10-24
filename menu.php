<?php


$menu = [
    "Pizzas Clásicas" => [
        [
            "nombre" => "Margarita",
            "descripcion" => "La pizza napolitana de toda la vida, sencilla y fresca.",
            "ingredientes" => "Salsa pomodoro, mozzarella fresca y albahaca",
            "imagen" => "img/margarita.jpg",
            "alt" => "Pizza Margarita con salsa de tomate, mozzarella y hojas de albahaca",
            "precios" => ["Personal (8\")" => 110, "Mediana (12\")" => 175, "Familiar (16\")" => 240, "Gigante (20\")" => 310]
        ],
        [
            "nombre" => "Pepperoni",
            "descripcion" => "La favorita de grandes y chicos, con pepperoni dorado al horno.",
            "ingredientes" => "Salsa pomodoro, mozzarella y pepperoni",
            "imagen" => "img/peperoni.jpg",
            "alt" => "Pizza de pepperoni con rodajas de pepperoni sobre queso derretido",
            "precios" => ["Personal (8\")" => 125, "Mediana (12\")" => 195, "Familiar (16\")" => 265, "Gigante (20\")" => 340]
        ],
        [
            "nombre" => "Hawaiana",
            "descripcion" => "El toque dulce de la piña con el sabor salado del jamón.",
            "ingredientes" => "Salsa pomodoro, mozzarella, jamón y piña",
            "imagen" => "img/pizza-ha.jpg",
            "alt" => "Pizza hawaiana con trozos de jamón y piña sobre queso mozzarella",
            "precios" => ["Personal (8\")" => 125, "Mediana (12\")" => 195, "Familiar (16\")" => 265, "Gigante (20\")" => 340]
        ],
        [
            "nombre" => "Cuatro Quesos",
            "descripcion" => "Una mezcla cremosa de cuatro quesos para los amantes del queso.",
            "ingredientes" => "Mozzarella, parmesano, provolone y gorgonzola",
            "imagen" => "img/4quesos.jpg",
            "alt" => "Pizza de cuatro quesos con la superficie cubierta de queso gratinado",
            "precios" => ["Personal (8\")" => 140, "Mediana (12\")" => 215, "Familiar (16\")" => 290, "Gigante (20\")" => 370]
        ]
    ],

    "Pizzas Gourmet de la Casa" => [
        [
            "nombre" => "Prosciutto di Parma",
            "descripcion" => "Jamón curado italiano que se agrega al salir del horno.",
            "ingredientes" => "Prosciutto de Parma, rúcula, parmesano y aceite de oliva",
            "imagen" => "img/Prosciutto.jpg",
            "alt" => "Pizza con láminas de prosciutto, rúcula fresca y lascas de parmesano",
            "precios" => ["Personal (8\")" => 165, "Mediana (12\")" => 250, "Familiar (16\")" => 335, "Gigante (20\")" => 420]
        ],
        [
            "nombre" => "Trufada Napolitana",
            "descripcion" => "Aroma intenso a trufa sobre una base cremosa de queso.",
            "ingredientes" => "Crema de trufa, mozzarella, champiñones y parmesano",
            "imagen" => "img/Trufada.jpg",
            "alt" => "Pizza trufada con champiñones laminados y queso parmesano",
            "precios" => ["Personal (8\")" => 175, "Mediana (12\")" => 265, "Familiar (16\")" => 350, "Gigante (20\")" => 440]
        ],
        [
            "nombre" => "Frutti di Mare",
            "descripcion" => "Pizza de mariscos con sabor a mar, ajo y perejil.",
            "ingredientes" => "Camarón, calamar, mejillones, ajo y perejil",
            "imagen" => "img/FruttidiMare.jpg",
            "alt" => "Pizza de mariscos con camarones, calamares y mejillones",
            "precios" => ["Personal (8\")" => 185, "Mediana (12\")" => 280, "Familiar (16\")" => 370, "Gigante (20\")" => 460]
        ],
        [
            "nombre" => "Carnívora Suprema",
            "descripcion" => "Cargada de carnes, ideal para compartir entre los más hambrientos.",
            "ingredientes" => "Pepperoni, jamón, tocineta, carne molida y chorizo",
            "imagen" => "img/carnivora.jpg",
            "alt" => "Pizza carnívora con pepperoni, jamón, tocineta y carne molida",
            "precios" => ["Personal (8\")" => 170, "Mediana (12\")" => 260, "Familiar (16\")" => 345, "Gigante (20\")" => 430]
        ]
    ],

    "Calzones y Especialidades al Horno" => [
        [
            "nombre" => "Calzone de Carnes",
            "descripcion" => "Pizza doblada y rellena, crujiente por fuera y jugosa por dentro.",
            "ingredientes" => "Jamón, pepperoni, carne molida y mozzarella",
            "imagen" => "img/calzoneCarne.jpg",
            "alt" => "Calzone dorado relleno de carnes y queso, cortado por la mitad",
            "precios" => ["Personal (8\")" => 130, "Mediana (12\")" => 200, "Familiar (16\")" => 270, "Gigante (20\")" => 340]
        ],
        [
            "nombre" => "Calzone Vegetariano",
            "descripcion" => "Relleno de verduras y ricotta, sin carne.",
            "ingredientes" => "Espinaca, champiñones, pimientos y ricotta",
            "imagen" => "img/vegetariano.jpg",
            "alt" => "Calzone vegetariano relleno de espinaca, champiñones y ricotta",
            "precios" => ["Personal (8\")" => 120, "Mediana (12\")" => 185, "Familiar (16\")" => 250, "Gigante (20\")" => 320]
        ],
        [
            "nombre" => "Focaccia con Romero",
            "descripcion" => "Pan italiano suave, aceitoso y con aroma a romero.",
            "ingredientes" => "Masa artesanal, romero, sal de mar y aceite de oliva",
            "imagen" => "img/Focaccia.jpg",
            "alt" => "Focaccia horneada con ramitas de romero y sal de mar encima",
            "precios" => ["Personal (8\")" => 70, "Mediana (12\")" => 95, "Familiar (16\")" => 140, "Gigante (20\")" => 180]
        ]
    ],

    "Bebidas y Postres Italianos" => [
        [
            "nombre" => "Tiramisú casero",
            "descripcion" => "Postre en capas hecho en casa, con café y cacao.",
            "ingredientes" => "Mascarpone, café espresso, bizcocho y cacao",
            "imagen" => "img/tiramisu.jpg",
            "alt" => "Porción de tiramisú con cacao en polvo por encima",
            "precios" => ["Precio por porción" => 85]
        ],
        [
            "nombre" => "Cannoli sicilianos",
            "descripcion" => "Tubos de masa crujiente rellenos de crema de ricotta.",
            "ingredientes" => "Masa crocante, ricotta dulce y chispas de chocolate",
            "imagen" => "img/Cannolisicilianos.jpg",
            "alt" => "Dos cannoli sicilianos rellenos de crema con chispas de chocolate",
            "precios" => ["Precio por 2 unidades" => 75]
        ],
        [
            "nombre" => "Bebidas gaseosas",
            "descripcion" => "Gaseosas bien frías para acompañar la pizza.",
            "ingredientes" => "Variedad de sabores, lata de 355 ml",
            "imagen" => "img/bebidaGaseosa.jpg",
            "alt" => "Latas de gaseosa de distintos sabores con hielo",
            "precios" => ["Precio por lata" => 30]
        ],
        [
            "nombre" => "Refrescos naturales",
            "descripcion" => "Preparados en el día con fruta natural.",
            "ingredientes" => "Limonada, horchata o jugo de naranja",
            "imagen" => "img/naturales.jpg",
            "alt" => "Vasos con refrescos naturales de limonada y naranja",
            "precios" => ["Precio por vaso" => 40]
        ]
    ]
];

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