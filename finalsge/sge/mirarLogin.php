<?php

    require('db.php');

    session_start();
    //print_r($_POST);

    // Este es el objeto de tipo conexion para la BD $conn->
    if (isset($_POST['passw'])) {
        $pcheck = $salt.$_POST['passw'];
        $pcifrado = hash("sha256",$pcheck);
        $password = $_POST['passw'];

        $stmt = $conn->prepare("SELECT id FROM users WHERE username= :us AND password =:pw");
        $stmt->bindParam(':us',$_POST['user']);
        $stmt->bindParam(':pw',$pcifrado);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if (count($stmt->fetchAll()) == 1) {
            
            $_SESSION['autorizado'] = true;
            if ($_POST["idioma"]!="") {
                setcookie("idioma",$_POST["idioma"],time()+3600);
            }
            $conn = null;
            header("Location:home.php");
        
        } else {
            header("Location:loginDB.php");
        }
        /*var_dump($result);
        var_dump($stmt->fetchAll());
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            echo $v;
        }*/

    }  
        

?>