<?php

    require('checklogin.php');
    print_r($_COOKIE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php
        if (isset($_COOKIE["idioma"])) {
            echo $_COOKIE["idioma"]=="en"? "<h1> Welcome!! </h1>" : "<h1>Bienvenido!!</h1>";
        } else {
            echo "<h1> Bienvenido no tienes cookies!! </h1>";
        }
    ?>
    <a href="productos.php"> Tabla Productos </a>
    <a href="pedidos.php"> Tabla Pedidos </a>
</body>
</html>