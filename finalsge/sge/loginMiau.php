<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        Contraseña <input type="text" name="passw" id="passw">
        <input type="submit" value="Enviar" name="submit">
    </form>

<?php

    session_start();

    if (!isset($_POST['passw'])) {
        $_SESSION['intentos'] = 5;
        //var_dump($_SESSION['intentos']);
    }

    if (isset($_POST['passw']) && $_SESSION['intentos'] != 0) {

        $test = strtolower($_POST['passw']);
        if ($test == 'miau') {
            // Autorizar
            $_SESSION['autorizado'] = true;
            header("Location: home.php");
        } else {
            $_SESSION['intentos']--;
            echo 'Has fallado '.(5 - $_SESSION['intentos']). ' intentos te quedan '.$_SESSION['intentos'].' intentos';
            if ($_SESSION['intentos'] == 0) {
                echo '<br/>No te quedan más intentos lo siento';
                header("Location: fuera.php");
            }
        }
    }  
        

?>
</body>
</html>

