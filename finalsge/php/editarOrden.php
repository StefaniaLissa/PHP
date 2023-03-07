<?php
//llamamos a la bbdd
require('db.php');

//recogemos el valor para las operaciones 
//tambien el producto ya que es clave compuesta
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
}
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orden</title>
    <!--importamos los estilos-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle w-50 p-3 border">
        <h3>Formulario de edición de productos</h3>
        <!-- formulario  de edicion, recoge los valores y los manda a modificarCompra-->
        <form method="POST" action="modificarOrden.php">
        <label for="idfactura">ID de la orden:
                <?php echo $valor; ?>
            </label>

            <label for="id_producto">ID Producto:
                <?php echo $producto; ?>
            </label>
            <br>

            <label for="cantidad">Cantidad:</label>
            <input type="text" class="form-control w-50" id="cantidad" name="cantidad"><br><br>

            <input type="hidden" name="valor" value="<?php echo $valor; ?>">
            <input type="hidden" name="producto" value="<?php echo $producto; ?>">
            <input type="submit" value="Enviar" class="btn btn-outline-secondary">
        </form>
        <!--boton volver-->
        <a href="http://pharmadam.es/compras/php/OrdenCompraTabla.php" class="btn btn-outline-secondary btn-sm">Volver</a>
    </div>

</body>

</html>

