<?php
   
    require("checklogin.php");
    require("db.php");

    //var_dump($_POST);

    $sql = "INSERT INTO pedidos (cliente, email, direccion, telefono, productos, total) 
    VALUES (:cliente,:email,:direccion,:telefono,:productos,:total)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cliente',$_POST["cliente"],PDO::PARAM_STR);
    $stmt->bindParam(':email',$_POST["email"],PDO::PARAM_STR);
    $stmt->bindParam(':direccion',$_POST["direccion"],PDO::PARAM_STR);
    $stmt->bindParam(':telefono',$_POST["telefono"],PDO::PARAM_STR);
    $stmt->bindParam(':productos',$_POST["productos"],PDO::PARAM_STR);
    $stmt->bindParam(':total',$_POST["total"],PDO::PARAM_STR);

    if ($stmt->execute() == true) {
        header("Location: pedidos.php");
    }

?>