<?php
require('db.php');

if (isset($_POST['idfactura'])) {
    $idfactura = $_POST['idfactura'];
}
if (isset($_POST['fecha'])) {
    $fecha = $_POST['fecha'];
}
if (isset($_POST['proveedor'])) {
    $proveedor = $_POST['proveedor'];
}
if (isset($_POST['importe'])) {
    $importe = $_POST['importe'];
}

if (isset($_POST['producto1'])) {
    $producto1 = $_POST['producto1'];
    
}
$detalle1 = explode(',', $producto1);
if (isset($_POST['producto2'])) {
    $producto2 = $_POST['producto2'];
    
}
$detalle1 = explode(',', $producto1);
if (isset($_POST['producto3'])) {
    $producto3 = $_POST['producto3'];
    
}
$detalle1 = explode(',', $producto1);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$stmt1 = $conn->prepare("INSERT INTO FacturaDetalle VALUES (:idfactura , :idproducto , :preciounitario, :preciototal, :cantidad)");
$stmt1->bindParam(':idfactura', $producto1['ID_DETALLE']);
$stmt1->bindParam(':idproducto', $producto1['ID_PRODUCTO']);
$stmt1->bindParam(':preciounitario', $producto1['PRECIO_UNITARIO']);
$stmt1->bindParam(':preciototal', $producto1['PRECIO_TOTAL']);
$stmt1->bindParam(':cantidad', $producto1['CANTIDAD']);
$stmt1->execute();

$stmt2 = $conn->prepare("INSERT INTO FacturaDetalle VALUES (:idfactura , :idproducto , :preciounitario, :preciototal, :cantidad)");
$stmt2->bindParam(':idfactura', $producto2['ID_DETALLE']);
$stmt2->bindParam(':idproducto', $producto2['ID_PRODUCTO']);
$stmt2->bindParam(':preciounitario', $producto2['PRECIO_UNITARIO']);
$stmt2->bindParam(':preciototal', $producto2['PRECIO_TOTAL']);
$stmt2->bindParam(':cantidad', $producto2['CANTIDAD']);
$stmt2->execute();

$stmt3 = $conn->prepare("INSERT INTO FacturaDetalle VALUES (:idfactura , :idproducto , :preciounitario, :preciototal, :cantidad)");
$stmt3->bindParam(':idfactura', $producto3['ID_DETALLE']);
$stmt3->bindParam(':idproducto', $producto3['ID_PRODUCTO']);
$stmt3->bindParam(':preciounitario', $producto3['PRECIO_UNITARIO']);
$stmt3->bindParam(':preciototal', $producto3['PRECIO_TOTAL']);
$stmt3->bindParam(':cantidad', $producto3['CANTIDAD']);
$stmt3->execute();

$stmt = $conn->prepare("INSERT INTO Facturas VALUES (:idfactura , :fecha , :proveedor, :importe)");
$stmt->bindParam(':idfactura', $idfactura);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':proveedor', $proveedor);
$stmt->bindParam(':importe', $importe);
//variables
$stmt->execute();

echo "comprueba";
?>
