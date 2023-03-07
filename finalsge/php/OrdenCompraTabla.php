<?php
session_start();
require('db.php');
require('loginCorrecto.php');


$id = $_GET['id_compra'];
echo $id;

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$stmt = $conn->prepare("SELECT * FROM OrdenCompra");
$stmt->execute();
$ordenes = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <div style="width: 100%; height: 100vh; position: absolute;">
        <div class="position-absolute  translate-left w-50 p-3 border">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="page-header">
                            Ordenes de compras
                        </h1>
                        <a href="http://pharmadam.es/compras/php/home.php" class="btn btn-outline-secondary btn-sm">Volver</a>
                        <!-- BOTONES -->
                        <form method="post" action="../html/formulario.html">
                            <button type="submit" name="add" class="btn btn-outline-dark">Realizar una orden</button>
                        </form>

                        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                            <!-- TABLA INICIA -->
                            <table id="tabla" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID_ORDEN</th>
                                        <th>FECHA</th>
                                        <th>DETALLE</th>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <input id="buscar" type="text" class="form-control"
                                                placeholder="Escriba algo para filtrar" />
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ordenes as $fila): ?>
                                        <tr>
                                            <td>
                                                <?php echo $fila['id_compra']; ?>
                                            </td>
                                            <td>
                                                <?php echo $fila['fecha']; ?>
                                            </td>

                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="valor"
                                                        value="<?php echo $fila['id_compra']; ?>">
                                                    <button type="submit" name="mostrar_tabla"
                                                        class="btn btn-outline-dark btn-sm">Detalle</button>
                                                </form>

                                                <?php

                                                $valor = 1;
                                                if (isset($_POST['mostrar_tabla'])) {
                                                    $tabla_oculta = false;
                                                    $valor = $_POST['valor'];
                                                    //echo "El valor de la fila es: " . $valor;
                                                    $stmtDetalle = $conn->prepare("SELECT * FROM OrdenCompraDetalle WHERE id_detalle=:valor");
                                                    $stmtDetalle->bindParam(':valor', $valor);
                                                    $stmtDetalle->execute();
                                                    $ordenesDetalle = $stmtDetalle->fetchAll();

                                                }
                                                ?>
                                            </td>
                                            <td>
                                                
                                                <form method="post" action="confirmarOrden.php">
                                                    <input type="hidden" name="valor"
                                                        value="<?php echo $fila['id_compra']; ?>">
                                                    <button type="submit" name="add"
                                                        class="btn btn-outline-danger btn-sm">Borrar</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- TABLA FINALIZA -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div
                class="position-absolute start-50 translate-right w-60 p-3 border table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                <h1 class="page-header">
                    Orden de compra Detalle
                </h1>
                <table id="tablaDetalle" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID_DETALLE</th>
                            <th>ID_PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>editar</th>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input id="buscarDetalle" type="text" class="form-control"
                                    placeholder="Escriba algo para filtrar el detalle" />
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- hacer un if-->
                        <?php foreach ($ordenesDetalle as $fila2): ?>

                            <tr>
                                <td>
                                    <?php echo $fila2['id_detalle']; ?>
                                </td>
                                <td>
                                    <?php echo $fila2['id_producto']; ?>
                                </td>
                                <td>
                                    <?php echo $fila2['cantidad']; ?>
                                </td>
                                <td>
                                    <form method="post" action="editarOrden.php">
                                        <input type="hidden" name="valor" value="<?php echo $fila2['id_detalle']; ?>">
                                        <input type="hidden" name="producto" value="<?php echo $fila2['id_producto']; ?>">
                                        <button type="submit" name="add" class="btn btn-outline-dark btn-sm">Editar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- TABLA FINALIZA -->
            </div>
        </div>
    </div>
    <script src="../js/filtrado.js">

    </script>

</body>

</html>