<?php

//comprobamos la sesión y conectamos a la base de datos
session_start();
require('db.php');
require('loginCorrecto.php');
 
?>

<html>
    <head>
        <meta charset8="utf8">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        
        <?php require 'header.php'?>
        <!--Damos la bienvenida-->
        <h1>BIENVENIDO AL SECTOR ECOMMERCE / MARKETING</h1>
        <p>Selecciona que tabla quieres consultar</p>
        <!-- enlaces a las paginas principales-->
        <form action="HistorialComprasTabla.php" method="post">
            <input type="submit" value="HistorialCompras">
        </form>
        <form action="OrdenCompraTabla.php" method="post">
            <input type="submit" value="OrdenCompra">
        </form>
        <form action="FacturasTablas.php" method="post">
            <input type="submit" value="Facturas">
        </form>
        <form action="HistorialComprasTabla.php" method="post">
            <input type="submit" value="HistorialCompras">
        </form>
        

    </body>
</html>

<?php
// Comprobar si la cookie ya existe
if(isset($_COOKIE['visitas'])) {
    $contador = $_COOKIE['visitas'];
} else {
    // Si no existe, crear la cookie con valor 1 y duración de un mes
    $contador = 1;
    $expiry = time() + (30 * 24 * 60 * 60); // Duración de un mes
    setcookie('visitas', $contador, $expiry);
}

// Mostrar el valor del contador
echo "Has visitado esta página $contador veces.";

// Actualizar el valor del contador y la cookie
$contador++;
$expiry = time() + (30 * 24 * 60 * 60); // Duración de un mes
setcookie('visitas', $contador, $expiry);
?>