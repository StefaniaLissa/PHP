<?php
   
    require("checklogin.php");
    require("db.php");

    var_dump($_POST);

    $cliente = $_POST["cliente"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $productos = $_POST["productos"];
    $total = $_POST["total"];
    $id = $_POST["id"];

    $sql = "UPDATE pedidos SET cliente = :cliente,
                direccion = :direccion,
                email = :email,
                telefono = :telefono,
                productos = :productos,
                total = :total
                WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cliente',$_POST["cliente"],PDO::PARAM_STR);
    $stmt->bindParam(':email',$_POST["email"],PDO::PARAM_STR);
    $stmt->bindParam(':direccion',$_POST["direccion"],PDO::PARAM_STR);
    $stmt->bindParam(':telefono',$_POST["telefono"],PDO::PARAM_STR);
    $stmt->bindParam(':productos',$_POST["productos"],PDO::PARAM_STR);
    $stmt->bindParam(':total',$_POST["total"],PDO::PARAM_STR);
    $stmt->bindParam(':id',$_POST["id"],PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->execute() == true) {
        header("Location: pedidos.php");
    }

?>
