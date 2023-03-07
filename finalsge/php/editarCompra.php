<?php

//llamamos a la bbdd
require('db.php');
//recogemos el valor para las operaciones
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar compra</title>
    <!--importamos los estilos-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle w-50 p-3 border">
        <h1>Editar compra</h1>

        <!-- formulario  de edicion, recoge los valores y los manda a modificarCompra-->
        <form method="POST" action="modificarCompra.php">
            <label for="id_compra">ID de Compra:
                <?php echo $valor ?>
            </label><br>

            <label for="id_factura">ID de Factura:</label>
            <input type="text" class="form-control w-50" id="id_factura" name="id_factura"><br>

            <label for="id_viaje">ID de Viaje:</label>
            <input type="text" class="form-control w-50" id="id_viaje" name="id_viaje"><br>

            <input type="hidden" name="valor" value="<?php echo $valor; ?>">

            <input type="submit" value="Enviar" class="btn btn-outline-secondary">
        </form>
        <!--boton volver-->
        <a href="http://pharmadam.es/compras/php/HistorialComprasTabla.php" class="btn btn-outline-secondary btn-sm">Volver</a>
        
    </div>
</body>

</html>
