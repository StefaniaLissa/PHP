<?php
session_start();
require('db.php');
require('loginCorrecto.php');

$id = $_GET['ID_COMPRA'];
echo $id;

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

$stmt = $conn->prepare("SELECT * FROM HistorialCompras");
$stmt->execute();
$compras = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tablas de compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div>
    <div class="position-absolute  translate-left w-100 p-3 border">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="page-header">
              HistorialCompras
            </h1>
            <a href="http://pharmadam.es/compras/php/home.php" class="btn btn-outline-secondary btn-sm">Volver</a>
            <!-- TABLA INICIA -->
            <table id="tabla" class="table table-striped">
              <thead>
                <tr>
                  <th>ID_COMPRA</th>
                  <th>ID_FACTURA</th>
                  <th>ID_VIAJE</th>
                  <th>FECHA</th>
                </tr>
                <tr>
                  <td colspan="4">
                    <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($compras as $fila): ?>
                  <tr>
                    <td>
                      <?php echo $fila['ID_COMPRA']; ?>
                    </td>
                    <td>
                      <?php echo $fila['ID_FACTURA']; ?>
                    </td>
                    <td>
                      <?php echo $fila['ID_VIAJE']; ?>
                    </td>
                    <td>
                      <?php echo $fila['FECHA']; ?>
                    </td>
                    <td>
                      <form method="post" action="editarCompra.php">
                        <input type="hidden" name="valor" value="<?php echo $fila['ID_COMPRA']; ?>">
                        <button type="submit" name="add" class="btn btn-outline-dark btn-sm">Editar</button>
                      </form>
                      <form method="post" action="confirmarCompra.php">
                        <input type="hidden" name="valor" value="<?php echo $fila['ID_COMPRA']; ?>">
                        <button type="submit" name="add" id="borrar" class="btn btn-outline-danger btn-sm">Borrar</button>
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
    <div>

    </div>
  </div>
  <script src="../js/filtradoHistorial.js">

  </script>
</body>

</html>