<?php
require('db.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idfactura=null;
$fecha=null;
$proveedor=null;
$importe=null;

$detalle1 = array(
    "ID_DETALLE" =>null,
    "ID_PRODUCTO"=>null,
    "PRECIO_UNITARIO"=>null,
    "PRECIO_TOTAL"=>null,
    "CANTIDAD"=>null
);
$detalle2 = array(
    "ID_DETALLE"=>null,
    "ID_PRODUCTO"=>null,
    "PRECIO_UNITARIO"=>null,
    "PRECIO_TOTAL"=>null,
    "CANTIDAD"=>null
);
$detalle3 = array(
    "ID_DETALLE"=>null,
    "ID_PRODUCTO"=>null,
    "PRECIO_UNITARIO"=>null,
    "PRECIO_TOTAL"=>null,
    "CANTIDAD"=>null
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Nueva Factura</h1>
    <div class="position-absolute  translate-left w-50 p-3 border">
        <form method="POST" action="">
            <label for="idfactura">ID de factura:</label>
            <input type="text" class="form-control w-50" id="idfactura" name="idfactura"><br>

            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control w-50" id="fecha" name="fecha"><br>

            <label for="proveedor">Nombre proveedor:</label>
            <input type="text" class="form-control w-50" id="proveedor" name="proveedor"><br>

            <label for="importe">Importe total:</label>
            <input type="number" class="form-control w-50" step="0.01" id="importe" name="importe"><br>

            <!--////////////////////////////-->
            <label>Productos:</label>

            <label for="id_producto">ID Producto:</label>
            <input type="text" class="form-control w-50" id="id_producto" name="id_producto"><br>

            <label for="precio_unitario">Precio Unitario:</label>
            <input type="text" class="form-control w-50" id="precio_unitario" name="precio_unitario"><br>

            <label for="precio_total">Precio Total:</label>
            <input type="text" class="form-control w-50" id="precio_total" name="precio_total"><br>

            <label for="cantidad">Cantidad:</label>
            <input type="text" class="form-control w-50" id="cantidad" name="cantidad"><br><br>

            <!--////////////////////////////-->

            <label for="id_producto">ID Producto:</label>
            <input type="text" class="form-control w-50" id="id_producto2" name="id_producto2"><br>

            <label for="precio_unitario">Precio Unitario:</label>
            <input type="text" class="form-control w-50" id="precio_unitario2" name="precio_unitario2"><br>

            <label for="precio_total">Precio Total:</label>
            <input type="text" class="form-control w-50" id="precio_total2" name="precio_total2"><br>

            <label for="cantidad">Cantidad:</label>
            <input type="text" class="form-control w-50" id="cantidad2" name="cantidad2"><br><br>

            <!--////////////////////////////-->

            <label for="id_producto">ID Producto:</label>
            <input type="text" class="form-control w-50" id="id_producto3" name="id_producto3"><br>

            <label for="precio_unitario">Precio Unitario:</label>
            <input type="text" class="form-control w-50" id="precio_unitario3" name="precio_unitario3"><br>

            <label for="precio_total">Precio Total:</label>
            <input type="text" class="form-control w-50" id="precio_total3" name="precio_total3"><br>

            <label for="cantidad">Cantidad:</label>
            <input type="text" class="form-control w-50" id="cantidad3" name="cantidad3"><br><br>

            <p>Click en guardar para revisar los datos</p>
            <input type="submit" value="Guardar" class="btn btn-outline-dark btn-sm">
        </form>
    </div>

    <div class="position-absolute start-50 translate-right w-50 p-3 border">
        <h2>Comprueba los datos</h2>
        <?php
        //var_dump($detalle1);
        //var_dump($detalle2);
        //var_dump($detalle3);
        echo "El id es: " . $idfactura . "<br>";
        echo " La fecha es: " . $fecha . "<br>";
        echo " El proveedor es: " . $proveedor . "<br>";
        echo " El importe es: " . $importe . "<br><br>";

        echo "ID_DETALLE: " . $detalle1["ID_DETALLE"] . "<br>";
        echo "ID_PRODUCTO: " . $detalle1["ID_PRODUCTO"] . "<br>";
        echo "PRECIO_UNITARIO: " . $detalle1["PRECIO_UNITARIO"] . "<br>";
        echo "PRECIO_TOTAL: " . $detalle1["PRECIO_TOTAL"] . "<br>";
        echo "CANTIDAD: " . $detalle1["CANTIDAD"] . "<br><br>";

        echo "ID_DETALLE: " . $detalle2["ID_DETALLE"] . "<br>";
        echo "ID_PRODUCTO: " . $detalle2["ID_PRODUCTO"] . "<br>";
        echo "PRECIO_UNITARIO: " . $detalle2["PRECIO_UNITARIO"] . "<br>";
        echo "PRECIO_TOTAL: " . $detalle2["PRECIO_TOTAL"] . "<br>";
        echo "CANTIDAD: " . $detalle2["CANTIDAD"] . "<br><br>";

        echo "ID_DETALLE: " . $detalle3["ID_DETALLE"] . "<br>";
        echo "ID_PRODUCTO: " . $detalle3["ID_PRODUCTO"] . "<br>";
        echo "PRECIO_UNITARIO: " . $detalle3["PRECIO_UNITARIO"] . "<br>";
        echo "PRECIO_TOTAL: " . $detalle3["PRECIO_TOTAL"] . "<br>";
        echo "CANTIDAD: " . $detalle3["CANTIDAD"] . "<br><br>";
        ?>

        
    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Comprobamos si el formulario ha sido enviado

    //DATOS PRINCIPALES

    if (isset($_POST["idfactura"])) { // Comprobamos si el input está definido
        $idfactura = $_POST["idfactura"]; // Recogemos el valor del input

    }
    if (isset($_POST["fecha"])) { // Comprobamos si el input está definido
        $fecha = $_POST["fecha"]; // Recogemos el valor del input

    }
    if (isset($_POST["proveedor"])) { // Comprobamos si el input está definido
        $proveedor = $_POST["proveedor"]; // Recogemos el valor del input

    }
    if (isset($_POST["importe"])) { // Comprobamos si el input está definido
        $importe = $_POST["importe"]; // Recogemos el valor del input

    }

    //DATOS DEL DETALLE

    if (isset($_POST["idfactura"])) { // Comprobamos si el input está definido
        $detalle1['ID_DETALLE'] = $_POST["idfactura"]; // Recogemos el valor del input
    }
    if (isset($_POST["id_producto"])) {
        $detalle1['ID_PRODUCTO'] = $_POST["id_producto"];
    }
    if (isset($_POST["precio_unitario"])) {
        $detalle1['PRECIO_UNITARIO'] = $_POST["precio_unitario"];
    }
    if (isset($_POST["precio_total"])) {
        $detalle1['PRECIO_TOTAL'] = $_POST["precio_total"];
    }
    if (isset($_POST["cantidad"])) {
        $detalle1['CANTIDAD'] = $_POST["cantidad"];
    }
    //var_dump($detalle1);

    //DATOS DEL DETALLE 2

    if (isset($_POST["idfactura2"])) { // Comprobamos si el input está definido
        $detalle2['ID_DETALLE'] = $_POST["idfactura2"]; // Recogemos el valor del input
    }
    if (isset($_POST["id_producto2"])) {
        $detalle2['ID_PRODUCTO'] = $_POST["id_producto2"];
    }
    if (isset($_POST["precio_unitario2"])) {
        $detalle2['PRECIO_UNITARIO'] = $_POST["precio_unitario2"];
    }
    if (isset($_POST["precio_total2"])) {
        $detalle2['PRECIO_TOTAL'] = $_POST["precio_total2"];
    }
    if (isset($_POST["cantidad2"])) {
        $detalle2['CANTIDAD'] = $_POST["cantidad2"];
    }
    //var_dump($detalle2);
    //DATOS DEL DETALLE 3

    if (isset($_POST["idfactura3"])) { // Comprobamos si el input está definido
        $detalle3['ID_DETALLE'] = $_POST["idfactura3"]; // Recogemos el valor del input
    }
    if (isset($_POST["id_producto3"])) {
        $detalle3['ID_PRODUCTO'] = $_POST["id_producto3"];
    }
    if (isset($_POST["precio_unitario3"])) {
        $detalle3['PRECIO_UNITARIO'] = $_POST["precio_unitario3"];
    }
    if (isset($_POST["precio_total3"])) {
        $detalle3['PRECIO_TOTAL'] = $_POST["precio_total3"];
    }
    if (isset($_POST["cantidad3"])) {
        $detalle3['CANTIDAD'] = $_POST["cantidad3"];
    }
    //var_dump($detalle3);
}
?>