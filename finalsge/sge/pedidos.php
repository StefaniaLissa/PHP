<?php

    require("checklogin.php");
    require("db.php");
    require("bootstrap.php");

    $stmt = $conn->prepare("SELECT * FROM pedidos");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<a href= "newPedido.php"> Crear nuevo pedido </a></br>';

    print "<table class='table table-dark table-striped table-hover'
    <thead> <tr>
    <th scope='col'>#</th>
    <th scope='col'>Id</th>
    <th scope='col'>Cliente</th>
    <th scope='col'>Email</th>
    <th scope='col'>Direccion</th>
    <th scope='col'>Telefono</th>
    <th scope='col'>Productos</th>
    <th scope='col'>Total</th>
    <th scope='col'>Acciones</th>
    </tr> </thead> <tbody>";
    
    foreach($result as $row) {

        print '
            <tr>
            <th scope="row">1</th>
            <td>'.$row["id"].'</td>
            <td>'.$row["cliente"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["direccion"].'</td>
            <td>'.$row["telefono"].'</td>
            <td>'.$row["productos"].'</td>
            <td>'.$row["total"].'</td>';
            print "<td><a class= 'btn btn-warning' href = 'editarPedido.php?id=".$row["id"]."'>editar <a class= 'btn btn-danger' href = '#' onclick = 'borrar(".$row["id"].")'> borrar</a></td></br>";
            print "</tr>
        ";
      
    }

    print "</tbody> </table>";
    // foreach($result as $row) {
    //     //print "<form action='borrarGolfer.php?id=".$row["id"]."' method='post'></form>"
    //     print ($row["id"]. " - " . $row["cliente"]. " - " . $row["email"] . " - " . $row["direccion"] . "</br>");
    //     print ($row["telefono"] . " - " . $row["productos"]  . " - " . $row["total"]  . "</br>");
    //     print "<a href = 'editarPedido.php?id=".$row["id"]."'>editar</a>";
    //     print "<a href = '#' onclick = 'borrar(".$row["id"].")'> borrar</a></br>";
    // }

    //print_r($stmt)

?>
<script>

    //document.getElementById().addEventListener("click", borrar,false);
    function borrar(id) {
        if (confirm("¿Seguro que deseas eliminar el pedido?") == true) {
            window.location.href = 'borrarPedido.php?id='+id;
        } else {           
            event.preventDefault()
            alert("Eliminación cancelada!");
        }
    }

</script>