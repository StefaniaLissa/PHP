<?php
   
    require("checklogin.php");
    require("db.php");

    //var_dump($_POST);

    $sql = "INSERT INTO productos (nombre, descripcion, precio) 
    VALUES (:nombre,:descripcion,:precio)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre',$_POST["nombre"],PDO::PARAM_STR);
    $stmt->bindParam(':descripcion',$_POST["descripcion"],PDO::PARAM_STR);
    $stmt->bindParam(':precio',$_POST["precio"],PDO::PARAM_STR);

    if ($stmt->execute() == true) {
        header("Location: productos.php");
    }

?>