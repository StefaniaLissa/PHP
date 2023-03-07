<?php

    //var_dump($_POST);

    require('db.php');

    $user =  $_POST['user'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    $pantes = $salt.$pass;
    $pcifrado = hash("sha256",$pantes);

    $sql = "INSERT INTO users (username, password, email, rol) VALUES (?,?,?,?)";
    //$stmt->prepare($sql)->execute()
    $stmt = $conn->prepare($sql);
    // use exec() because no results are returned
    //$sql->exec(array[$a,$e,$i,$o]);
    $stmt->execute([$user,$pcifrado,$email,$rol]);
    echo "Insertado nuevo usuario";
  
    $conn = null;

?>