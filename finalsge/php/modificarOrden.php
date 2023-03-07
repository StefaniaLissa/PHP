<?php
//conectamos con la bbdd y recogemos los varoles del formulario
require('db.php');
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
}
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];
}
if (isset($_POST['cantidad'])) {
    $cantidad = $_POST['cantidad'];
}

// modificamos los datos y ejecutamos
$sql = "UPDATE OrdenCompraDetalle SET cantidad=:cantidad WHERE id_detalle=:valor AND id_producto=:producto";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
$stmt->bindParam(':producto', $producto, PDO::PARAM_STR);
$stmt->bindParam(':cantidad', $cantidad);

$stmt->execute();

//redirección
if($stmt->execute()==true)
    header("Location: http://pharmadam.es/compras/php/OrdenCompraTabla.php");
?>




