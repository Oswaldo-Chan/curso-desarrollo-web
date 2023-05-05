<?php include 'includes/header.php';

$productos = [
    [
        'name' => 'tablet',
        'costo' => 200,
        'disponible' => true
    ],
    [
        'name' => 'celular',
        'costo' => 100,
        'disponible' => false
    ],
    [
        'name' => 'monitor',
        'costo' => 550,
        'disponible' => true
    ]
];

foreach ($productos as $producto) { ?> <!-- php termina aqui -->

    <li>
        <p>Producto: <?php echo $producto['name']; ?></p>
        <p>Precio: <?php echo "$".$producto['costo']; ?></p>
        <!-- Operador Ternario -->
        <p>Precio: <?php echo ($producto['disponible']) ? 'disponible' : 'no disponible' ?></p>
    </li>

    <?php
}

include 'includes/footer.php';