<?php
// Llamamos al php con la conexión a la BBDD
require('db.php');
// recogemos el valor del id para el select a la fila que queremos borrar
$valor = $_GET['valor'];

// por si los fallos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// borramos el registro de la tabla
$stmt = $conn->prepare("DELETE FROM HistorialCompras WHERE ID_COMPRA=:valor");
$stmt->bindParam(':valor', $valor);
$stmt->execute();

// redirigimos
if($stmt->execute()==true)
    header("Location: http://pharmadam.es/compras/php/HistorialComprasTabla.php");
?>