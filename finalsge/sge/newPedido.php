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
        <title>Añadir Pedido</title>
    </head>
    <body>
        <form action="crearPedido.php" method="post">
            Cliente <input type="text" name="cliente" id="cliente"/> </br>
            Email <input type="text" name="email" id="email"/> </br>
            Direccion <input type="text" name="direccion" id="direccion"/> </br>
            Telefono <input type="text" name="telefono" id="telefono"/> </br> 
            Productos <input type="textarea" name="productos" id="productos"/> </br>
            Total <input type="text" name="total" id="total"/> </br>
            <input type="submit" value="Insertar Pedido"/>
        </form>
        <a href = "pedidos.php"> Volver sin crear </a>
        
    </body>
</html>