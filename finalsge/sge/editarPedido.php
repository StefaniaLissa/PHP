<?php

    require("checklogin.php");
    require("db.php");
    print_r($_GET);
    echo $_GET["id"];
    $id = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM pedidos WHERE id = :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($result);

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="modificarPedido.php" method="post">
            Cliente <input type="text" name="cliente" id="cliente" value='<?php echo $result["cliente"]?>'/> </br>
            Email <input type="text" name="email" id="email" value='<?php echo $result["email"]?>'/> </br>
            Direccion <input type="text" name="direccion" id="direccion" value='<?php echo $result["direccion"]?>'/> </br>
            Telefono <input type="text" name="telefono" id="telefono" value='<?php echo $result["telefono"]?>'/> </br>
            Productos <input type="text" name="productos" id="productos" value='<?php echo $result["productos"]?>'/> </br> 
            Total <input type="text" name="total" id="total" value='<?php echo $result["total"]?>'/> </br>
            <input type="hidden" name="id" value='<?php echo $_GET["id"] ?>'/>
            <input type="submit" value="Modificar Pedido"/>
        </form>
        <a href = "pedidos.php"> Volver sin modificar </a>
        
    </body>
</html>