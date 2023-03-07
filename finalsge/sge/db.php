<?php

    $json = file_get_contents('db.json');
    $json_data = json_decode($json , true);

    $servername = $json_data["servername"];
    $username = $json_data["username"];
    $password = $json_data["password"];
    $dbname = $json_data["dbname"];
    $salt = $json_data["salt"];;

    //$salt = random_int(1, 5567567567);
    //print_r(hash_algos());
    // echo $salt;
    // echo "</br>"
    // echo hash("sha256,$p1");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>