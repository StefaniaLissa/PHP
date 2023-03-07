<?php

// recogemos el id para enviarlo al php que elimina el registro
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
    <title>Confirmar</title>
    <!-- llamamos a boostrap para los estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle w-50 p-3 border">

        <!--Avisamos al usuario de que está a punto de borrar un registro -->
        <h1>Estas a punto de borrar el registro de id:
            <?php echo $valor; ?>
        </h1>

        <h3>¿Estas seguro?</h3>

        <input type="button" id="borrar" value="Confirmar operación" class="btn btn-outline-danger "><br>

        <!--Opción de volver atrás-->
        <a href="http://pharmadam.es/compras/php/OrdenCompraTabla.php" class="btn btn-outline-secondary">Volver</a>
    </div>

    <script>

        //programa js que realiza una ultima confirmación 
        document.getElementById("borrar").addEventListener("click", aviso, false)

        function aviso() {

            let text;
            let acepta = false;

            if (confirm("¿Seguro que quieres borrar?") == true) {
                acepta = true;
            } else {
                preventDefault()
            }
            if (acepta) {
                window.location.href = "borrarOrden.php?valor=" + encodeURIComponent('<?php echo $valor; ?>');
            }
        }

    </script>
</body>

</html>