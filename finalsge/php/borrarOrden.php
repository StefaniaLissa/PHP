<?php

// Llamamos al php con la conexión a la BBDD
require('db.php');
// recogemos el valor del id para el select a la fila que queremos borrar
$valor = $_GET['valor'];

// por si los fallos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//borramos primero el registro o los registros de la tabla detalle por las foreign keys
$stmtDetalle = $conn->prepare("DELETE FROM OrdenCompraDetalle WHERE id_detalle=:valor");
$stmtDetalle->bindParam(':valor', $valor);
$stmtDetalle->execute();

// para terminar borramos de la tabla principal
$stmt = $conn->prepare("DELETE FROM OrdenCompra WHERE id_compra=:valor");
$stmt->bindParam(':valor', $valor);
$stmt->execute();

//redirigimos
if($stmt->execute()==true)
    header("Location: http://pharmadam.es/compras/php/OrdenCompraTabla.php");
?>

