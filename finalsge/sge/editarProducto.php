<?php

    require("checklogin.php");
    require("db.php");
    print_r($_GET);
    echo $_GET["id"];
    $id = $_GET["id"];

    $stmt = $conn->prepare("SELECT * FROM productos WHERE id = :id");
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
        <form action="modificarProducto.php" method="post">
            Nombre <input type="text" name="nombre" id="nombre" value='<?php echo $result["nombre"]?>'/> </br>
            Descripcion <input type="text" name="descripcion" id="descripcion" value='<?php echo $result["descripcion"]?>'/> </br>
            Precio <input type="text" name="precio" id="precio" value='<?php echo $result["precio"]?>'/> </br>
            <input type="hidden" name="id" value='<?php echo $_GET["id"] ?>'/>
            <input type="submit" value="Modificar Producto"/>
        </form>
        <a href = "productos.php"> Volver sin modificar </a>
        
    </body>
</html>