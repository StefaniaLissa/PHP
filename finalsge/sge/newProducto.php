<?php

    require("checklogin.php");
    require("db.php");

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Añadir Producto</title>
    </head>
    <body>
        <form action="crearProducto.php" method="post">
            Nombre <input type="text" name="nombre" id="nombre"/> </br>
            Descripcion <input type="text" name="descripcion" id="descripcion"/> </br>
            Precio <input type="text" name="precio" id="precio"/> </br>
            <input type="submit" value="Insertar Producto"/>
        </form>
        <a href = "productos.php"> Volver sin crear </a>
        
    </body>
</html>