<?php
  session_start();
  require("db.php");
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena']; 

  if(!empty($usuario) && !empty($contrasena)){
    $stmt = $conn->prepare("SELECT id, Nombre, Contrasena FROM Usuarios WHERE Nombre=:nombre");
    $stmt->bindParam(':nombre', $usuario);
    $stmt->execute();
    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

    $conCifrada = hash('sha256', $contrasena);

    if(count($resultados) > 0 && ($conCifrada == $resultados['Contrasena'])){
        $_SESSION['autorizado'] = true;
        header("Location: home.php");
    }else{
        $mensaje = '<p style="color:red;"> Usuario o contraseña incorrectos</p>';
    }
  } 

?>

<html>
    <head>
        <meta charset8="utf8">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        
        <?php require 'header.php'?>
        <h1>Iniciar sesión</h1>
        <span>o <a href="registrarse.php"> registrarse</a></span>
        <form action="login.php" method="post">
            <input type="text" name="usuario" placeholder="Introduzca el usuario">
            <input type="password" name="contrasena" placeholder="Introduzca la contraseña">
            <input type="submit" value="Entrar">
        </form>

        <?php if(!empty($mensaje)): ?>
            <!-- Para que muestre el mensaje (=) -->
            <p><?= $mensaje ?></p>
        <?php endif; ?>

    </body>
</html>