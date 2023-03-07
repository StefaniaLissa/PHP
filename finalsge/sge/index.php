<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1> Saludo Html</h1>

<?php
    echo "<h2>Saludo Php</h2>"
?>

<form action="entrada.php" method="POST">
    Nombre <input type="text" name="nombre" id="nombre"> <br>
    Password <input type="password" name="password" id="password"> <br>
    <input type="submit" value="Enviar">
</form>

<!--mostrar materias primas por categorias-->
<?php
    include('db.php');
    $stmt = $conn->prepare("SELECT DISTINCT Categoria FROM MateriasPrimas");
    $stmt->execute();
    $categorias = $stmt->fetchAll();
    ?>

    <h1> Categorias Materias Primas </h1>
    <h2> Buscar por Categorias</h2>
    <table id="categorias">
        <thead>
            <tr>
                <td>
                    <input id="buscar" type="text" placeholder="Buscar..." />
                </td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $row): ?>
            <tr>
                <td>
                    <?php echo $row['Categoria']; ?>
                </td>
                <td>
                     <form method="post">
                        <input type="hidden" name="categoria"
                            value="<?php echo $row['Categoria']; ?>">
                        <button type="submit" name="mostrar">Ver Productos</button>
                    </form>
                    <?php
                    $categoria = 1;
                    if (isset($_POST['mostrar'])) {
                        $tabla_oculta = false;
                        $categoria = $_POST['categoria'];
                        $stmtCategoria = $conn->prepare("SELECT Nombre, Proveedor, Pureza, Stock, PrecioUnidad FROM MateriasPrimas WHERE Categoria=:categoria");
                        $stmtCategoria->bindParam(':categoria', $categoria);
                        $stmtCategoria->execute();
                        $categoriasProd = $stmtCategoria->fetchAll();
                    }
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2> Ver productos: <?php echo $categoria?></h2>
    <table id="productosCategoria">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Pureza</th>
                <th>Stock</th>
                <th>PrecioUnidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categoriasProd as $row2): ?>

                <tr>
                    <td>
                        <?php echo $row2['Nombre']; ?>
                    </td>
                    <td>
                        <?php echo $row2['Proveedor']; ?>
                    </td>
                    <td>
                        <?php echo $row2['Pureza']; ?>
                    </td>
                    <td>
                        <?php echo $row2['Stock']; ?>
                    </td>
                    <td>
                        <?php echo $row2['PrecioUnidad']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    

    <h2> Ver todos los productos</h2>
    <?php
    $stmtProd = $conn->prepare("SELECT * FROM MateriasPrimas");
    $stmtProd->execute();
    $productos = $stmtProd->fetchAll();
    ?>
    <table id="productos">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Pureza</th>
                <th>Stock</th>
                <th>PrecioUnidad</th>
            </tr>
            <tr>
                <td>
                    <input id="buscarProd" type="text" placeholder="Buscar..." />
                </td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $row3): ?>
            <tr>
                <td>
                    <?php echo $row3['Nombre']; ?>
                </td>
                <td>
                    <?php echo $row3['Proveedor']; ?>
                </td>
                <td>
                    <?php echo $row3['Pureza']; ?>
                </td>
                <td>
                    <?php echo $row3['Stock']; ?>
                </td>
                <td>
                    <?php echo $row3['PrecioUnidad']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <script src="./index.js"></script> 
</body>
</html>