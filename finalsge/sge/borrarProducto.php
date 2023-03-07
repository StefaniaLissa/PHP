

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        require("checklogin.php");
        require("db.php");
        $id = $_GET["id"];

        var_dump($_POST); 
        
        $sql = "DELETE FROM productos WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
    
        if ($stmt->execute() == true) {
            echo '<script language="javascript"> alert("Producto borrado") </script>';
            header("Location: productos.php");
        }

    ?>
    <script>
        
        $text;
        
    </script>    
</body>
</html>