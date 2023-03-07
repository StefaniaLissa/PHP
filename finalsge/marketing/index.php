<!DOCTYPE html>
<html>
<head>
	<title>Módulo de Marketing</title>
</head>
<body>
	<h1>Bienvenido al Módulo de Marketing</h1>
	<p>Por favor inicie sesión o regístrese para acceder a la plataforma:</p>
    
	<form method="post">
		<input type="text" name="usuario" placeholder="Introduzca el usuario" required>
		<input type="password" name="contrasena" placeholder="Introduzca la contraseña" required>
		<input type="submit" value="Entrar">
	</form>

	<p>¿No tiene una cuenta? <a href="php/registro.php">Regístrese aquí</a>.</p>


	<?php
        session_start();

        // Conexión a la base de datos
        require("./php/db.php");

        // Verificar si el formulario de inicio de sesión fue enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena']; 

            // Validar si los campos de usuario y contraseña no están vacíos
            if(!empty($usuario) && !empty($contrasena)){
                // Preparar consulta para obtener datos del usuario
                $stmt = $conn->prepare("SELECT id, Nombre, Contrasena FROM Usuarios WHERE Nombre=:nombre");
                $stmt->bindParam(':nombre', $usuario);
                $stmt->execute();
                $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

                // Cifrar la contraseña ingresada por el usuario
                $conCifrada = hash('sha256', $contrasena);

                // Verificar si el usuario existe y si la contraseña es correcta
                if(count($resultados) > 0 && ($conCifrada == $resultados['Contrasena'])){
                    // Iniciar sesión y redirigir al usuario al panel de control
                    $_SESSION['autorizado'] = true;
                    header("Location: ./php/home.php");
                    exit;
                }else{
                    // Mostrar un mensaje de error en caso de credenciales incorrectas
                    echo '<p style="color:red;"> Usuario o contraseña incorrectos</p>';
                }
            } else {
                // Mostrar un mensaje de error en caso de que falten campos
                echo '<p style="color:red;"> Rellenar todos los campos</p>';
            }
        }
    ?>

</body>
</html>