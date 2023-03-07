<?php

//conectamos con la bbdd y recogemos los varoles del formulario
require('db.php');
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
}
if (isset($_POST['id_factura'])) {
    $id_factura = $_POST['id_factura'];
}
if (isset($_POST['id_viaje'])) {
    $id_viaje = $_POST['id_viaje'];
}

//comprobamos que llegan los datos
echo $valor; 
echo $id_factura;
echo $id_viaje;

// modificamos los datos y ejecutamos
$sql = "UPDATE HistorialCompras SET ID_FACTURA=:id_factura , ID_VIAJE=:id_viaje WHERE ID_COMPRA=:valor";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
$stmt->bindParam(':id_factura', $id_factura, PDO::PARAM_STR);
$stmt->bindParam(':id_viaje', $id_viaje);

$stmt->execute();

//redirección
if($stmt->execute()==true)
    header("Location: http://pharmadam.es/compras/php/HistorialComprasTabla.php");
?>