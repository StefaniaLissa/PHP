<?php
session_start();
require('db.php');
require('loginCorrecto.php');

$id = $_GET['ID_FACTURA'];
echo $id;

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$stmt = $conn->prepare("SELECT * FROM Facturas");
$stmt->execute();
$facturas = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Facturas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php require 'header.php'?>
  <div class="position-absolute  translate-left w-50 p-3 border">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="page-header">
            Facturas
          </h1>
          <a href="http://pharmadam.es/compras/php/home.php" class="btn btn-outline-secondary btn-sm">Volver</a>
          <!-- BOTONES -->
          <form method="post" action="../html/formularioFactura.html">
            <button type="submit" name="add" class="btn btn-outline-dark">Crear Factura</button>
          </form>

          <!-- TABLA INICIA -->
          <table id="tabla" class="table table-striped">
            <thead>
              <tr>
                <th>ID_FACTURA</th>
                <th>FECHA</th>
                <th>IMPORTE</th>
                <th>PROVEEDOR</th>
                <th>DETALLE</th>
              </tr>
              <tr>
                <td colspan="5">
                  <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
                </td>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($facturas as $fila): ?>
                <tr>
                  <td>
                    <?php echo $fila['ID_FACTURA']; ?>
                  </td>

                  <td>
                    <?php echo $fila['FECHA']; ?>
                  </td>
                  <td>
                    <?php echo $fila['IMPORTE']; ?>
                  </td>
                  <td>
                    <?php echo $fila['NOMBRE_PROVEEDOR']; ?>
                  </td>
                  <td>
                    <form method="post">
                      <input type="hidden" name="valor" value="<?php echo $fila['ID_FACTURA']; ?>">
                      <button type="submit" name="mostrar_tabla" class="btn btn-outline-dark btn-sm">Detalle</button>
                    </form>

                    <?php

                    if (isset($_POST['mostrar_tabla'])) {
                      $tabla_oculta = false;
                      $valor = $_POST['valor'];
                      //echo "El valor de la fila es: " . $valor;
                      $stmtFactura = $conn->prepare("SELECT * FROM FacturaDetalle WHERE ID_DETALLE=:valor");
                      $stmtFactura->bindParam(':valor', $valor);
                      $stmtFactura->execute();
                      $facturasDetalle = $stmtFactura->fetchAll();
                    }
                    ?>
                  </td>
                  <td>
                    <form method="post" action="editarFactura.php">
                      <input type="hidden" name="valor" value="<?php echo $fila['ID_FACTURA']; ?>">
                      <button type="submit" name="add" class="btn btn-outline-dark btn-sm">Editar</button>
                    </form>
                    <form method="post" action="confirmarFactura.php">
                      <input type="hidden" name="valor" value="<?php echo $fila['ID_FACTURA']; ?>">
                      <input type="hidden" name="fecha" value="<?php echo $fila['FECHA']; ?>">
                      <button type="submit" name="add" class="btn btn-outline-danger btn-sm">Borrar</button>
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
  <div class="position-absolute start-50 translate-right w-60 p-3 border">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="page-header">
            Facturas Detalle
          </h1>
          <table id="tablaDetalle" class="table table-striped">
            <thead>
              <tr>
                <th>ID_DETALLE</th>
                <th>ID_PRODUCTO</th>
                <th>PRECIO_UNITARIO</th>
                <th>PRECIO_TOTAL</th>
                <th>CANTIDAD</th>
                <th>editar</th>
              </tr>
              <tr>
                <td colspan="4">
                  <input id="buscarDetalle" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
                </td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($facturasDetalle as $fila2): ?>
                <tr>
                  <td>
                    <?php echo $fila2['ID_DETALLE']; ?>
                  </td>
                  <td>
                    <?php echo $fila2['ID_PRODUCTO']; ?>
                  </td>
                  <td>
                    <?php echo $fila2['PRECIO_UNITARIO']; ?>
                  </td>
                  <td>
                    <?php echo $fila2['PRECIO_TOTAL']; ?>
                  </td>
                  <td>
                    <?php echo $fila2['CANTIDAD']; ?>
                  </td>
                  <td>
                    <form method="post" action="editarFacturaDetalle.php">
                      <input type="hidden" name="valor" value="<?php echo $fila2['ID_DETALLE']; ?>">
                      <input type="hidden" name="producto" value="<?php echo $fila2['ID_PRODUCTO']; ?>">
                      <button type="submit" name="add" class="btn btn-outline-dark btn-sm">Editar</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- TABLA FINALIZA -->
        </div>

        <script src="../js/filtradoFacturas.js"></script>
</body>

</html>