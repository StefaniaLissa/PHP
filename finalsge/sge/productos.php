<?php

    require("checklogin.php");
    require("db.php");
    require("bootstrap.php");

    $stmt = $conn->prepare("SELECT * FROM productos");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<a href= "newProducto.php"> Crear nuevo producto </a></br>';
    print "<table class='table table-dark table-striped table-hover'
    <thead> <tr>
    <th scope='col'>#</th>
    <th scope='col'>Id</th>
    <th scope='col'>Nombre</th>
    <th scope='col'>Descripcion</th>
    <th scope='col'>Precio</th>
    <th scope='col'>Acciones</th>
    </tr> </thead> <tbody>";
    
    foreach($result as $row) {
        //print "<form action='borrarGolfer.php?id=".$row["id"]."' method='post'></form>"

        print '
            <tr>
            <th scope="row">1</th>
            <td>'.$row["id"].'</td>
            <td>'.$row["nombre"].'</td>
            <td>'.$row["descripcion"].'</td>
            <td>'.$row["precio"].'</td>';
            print "<td><a class= 'btn btn-warning' href = 'editarProducto.php?id=".$row["id"]."'>editar <a class= 'btn btn-danger' href = '#' onclick = 'borrar(".$row["id"].")'> borrar</a></td></br>";
            print "</tr>
        ";
      
    }

    print "</tbody> </table>";

    //print_r($stmt)

?>
<script>

    //document.getElementById().addEventListener("click", borrar,false);
    function borrar(id) {
        if (confirm("¿Seguro que deseas eliminar el producto?") == true) {
            window.location.href = 'borrarProducto.php?id='+id;
        } else {           
            event.preventDefault()
            alert("Eliminación cancelada!");
        }
    }

</script>