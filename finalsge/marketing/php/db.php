<?php

    $servername = "hl1173.dinaserver.com";
    $username = "sge";
    $password = "DAM2v2023!";
    $dbname = "pharmadam";
    $salt = "dam";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>