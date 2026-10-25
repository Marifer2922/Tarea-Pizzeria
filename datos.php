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
