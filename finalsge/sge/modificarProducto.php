<?php
   
    require("checklogin.php");
    require("db.php");

    var_dump($_POST);

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $id = $_POST["id"];

    $sql = "UPDATE productos SET nombre = :nombre,
                precio = :precio,
                descripcion = :descripcion
                WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre',$_POST["nombre"],PDO::PARAM_STR);
    $stmt->bindParam(':precio',$_POST["precio"],PDO::PARAM_STR);
    $stmt->bindParam(':descripcion',$_POST["descripcion"],PDO::PARAM_STR);
    $stmt->bindParam(':id',$_POST["id"],PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->execute() == true) {
        header("Location: productos.php");
    }

?>
