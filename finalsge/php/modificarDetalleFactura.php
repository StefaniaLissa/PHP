<?php
//conectamos con la bbdd y recogemos los varoles del formulario
require('db.php');
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
}
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];
}
if (isset($_POST['precio_unitario'])) {
    $precio_unitario = $_POST['precio_unitario'];
}
if (isset($_POST['precio_total'])) {
    $precio_total = $_POST['precio_total'];
}
if (isset($_POST['cantidad'])) {
    $cantidad = $_POST['cantidad'];
}

//comprobamos que llegan los datos
echo $producto;
echo $precio_unitario;
echo $precio_total;
echo $cantidad;

// modificamos los datos y ejecutamos
$sql = "UPDATE FacturaDetalle SET PRECIO_UNITARIO=:precio_unitario , PRECIO_TOTAL=:precio_total , CANTIDAD=:cantidad WHERE ID_DETALLE=:valor AND ID_PRODUCTO=:producto";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
$stmt->bindParam(':producto', $producto, PDO::PARAM_STR);
$stmt->bindParam(':precio_unitario', $precio_unitario);
$stmt->bindParam(':precio_total', $precio_total);
$stmt->bindParam(':cantidad', $cantidad);

$stmt->execute();

//redirección
if($stmt->execute()==true)
    header("Location: http://pharmadam.es/compras/php/FacturasTablas.php");
?>