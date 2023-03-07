<?php
// Comprobar si la cookie ya existe
if (isset($_COOKIE['miCookie'])) {
    $inicio = $_COOKIE['miCookie'];
} else {
    // Si no existe, crear la cookie con el tiempo actual y duración de un mes
    $inicio = time();
    $expiry = time() + (30 * 24 * 60 * 60); // Duración de un mes
    setcookie('miCookie', $inicio, $expiry);
}

// Calcular el tiempo transcurrido y mostrarlo
$tiempoTranscurrido = time() - $inicio;
echo "Tiempo que llevas conectado: " . $tiempoTranscurrido . " segundos.";

// Actualizar la cookie con el tiempo actual y la nueva duración
$expiry = time() + (30 * 24 * 60 * 60); // Duración de un mes
setcookie('miCookie', time(), $expiry);

// Iniciar sesion invitado
// session_start();
 include("db.php");

?>
<html>

<head>
    <meta charset8="utf8">
    <title>Ecommerce / Marketing</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Inicie sesion o regístrese</h1>
    <!--pantalla de log-in-->
    <a href="php/login.php">Iniciar sesion</a> o
    <a href="php/registrarse.php">Registrarse</a>

    <!--mostrar materias primas por categorias-->
    <?php
    include('db.php');
    $stmt = $conn->prepare("SELECT Categoria FROM MateriasPrimas");
    $stmt->execute();
    $categorias = $stmt->fetchAll();
    ?>

    <div class="position-absolute  translate-left w-50 p-3 border">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-header">
                        Categorias Materias Primas
                    </h1>
                    <!-- TABLA INICIA -->
                    <table id="tabla" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($categorias as $fila): ?>
                            <tr>
                                <td>
                                    <?php echo $fila['Categoria']; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- TABLA FINALIZA -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>