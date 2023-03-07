<?php
session_start();

    require ("db.php");
    // Recoger valores del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    $mensaje = '';

    if(!empty($nombre) && !empty($email) && !empty($contrasena) && !empty($rol) && $rol == "ecommerce"){
        // Comprobar si el usuario ya existe en la base de datos
        $stmt = $conn->prepare("SELECT COUNT(*) FROM Usuarios WHERE Nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            // El usuario ya existe, redirigir a la página de registro con error
            //header("Location: login.php");
            $mensaje = '<p style="color:blue;"> El usuario ya existe. Inicie Sesión</p>';
           
        }else{
            // Insertar usuario en la base de datos
            $pcifrado = hash("sha256", $contrasena);
            $stmt = $conn->prepare("INSERT INTO Usuarios (Nombre, Contrasena, Email, Rol) VALUES (:nombre, :contrasena, :email, :rol)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':contrasena', $pcifrado);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':rol', $rol);
     
            if ($stmt->execute()) {
                // Usuario registrado correctamente, redirigir a la página de inicio
                $mensaje =  '<p style="color:blue;"> Usuario creado correctamente.</p>';
                //header("Location: login.php");
                //$conn = null;
            } else {
                $mensaje = '<p style="color:red;"> ERROR: No se ha podido crear el usuario.</p>';
            }
        }
    }
    
    
?>

<html>
    <head>
        <meta charset8="utf8">
        <title>Registrarse</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        
        <?php require 'header.php'?>
    
        <h1>Registrarse</h1>
        <span>o <a href="login.php"> Iniciar sesion</a></span>
        <form action="registrarse.php" method="post">
            <input type="text" name="nombre" placeholder="Introduzca el usuario" require>
            <input type="text" name="email" placeholder="Introduzca el correo" require>
            <input type="password" name="contrasena" placeholder="Introduzca la contraseña" require>
            <input type="text" name="rol" placeholder="Introduzca el rol (ecommerce)" pattern="ecommerce" require>
            <input type="submit" value="Entrar">
        </form>

        <?php if(!empty($mensaje)): ?>
            <!-- Para que muestre el mensaje (=) -->
            <p><?= $mensaje ?></p>
        <?php endif; ?>

    </body>
</html>