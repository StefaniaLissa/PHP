<?php
//conectamos con la bbdd y recogemos los varoles del formulario
require('db.php');
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
}
if (isset($_POST['proveedor'])) {
    $proveedor = $_POST['proveedor'];
}
if (isset($_POST['importe'])) {
    $importe = $_POST['importe'];
}

// modificamos los datos y ejecutamos
$sql = "UPDATE Facturas SET  IMPORTE=:importe , NOMBRE_PROVEEDOR=:proveedor WHERE ID_FACTURA=:valor";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
$stmt->bindParam(':proveedor', $proveedor, PDO::PARAM_STR);
$stmt->bindParam(':importe', $importe);

$stmt->execute();
//redirección
if($stmt->execute()==true)
    header("Location: http://pharmadam.es/compras/php/FacturasTablas.php");
?>