<?php
require ("db.php");

    //Se comprueba que todos los productos introducidos sean diferentes. Si no es así se mostrará un mensaje de error
    if($_GET['idProducto1']==$_GET['idProducto2'] || $_GET['idProducto1']==$_GET['idProducto3'] || $_GET['idProducto2']==$_GET['idProducto3']){
        
        echo '<p style="color:red;"> Error al realizar el pedido. Introduce productos diferentes.</p>';
    
    }else{

        try {
            //Estas líneas establecen el modo de error de la conexión a la base de datos a "ERRMODE_EXCEPTION",
            //lo que significa que las excepciones serán arrojadas si ocurre algún error.
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Seleccionamos la fecha actual
            $fechaActual = date("Y-m-d");
            
            //Guardamos el valor que nos retorna el método insertar y a la vez se inserta la nueva orden en la tabla
            $id_detalle =  insertarOrdenCompra($conn, $fechaActual);
            
            //insertamos los 3 productos introducidos
            insertarProducto($conn, $id_detalle, $_GET['idProducto1'], $_GET['cantidad1']);
            insertarProducto($conn, $id_detalle, $_GET['idProducto2'], $_GET['cantidad2']);
            insertarProducto($conn, $id_detalle, $_GET['idProducto3'], $_GET['cantidad3']);

            //Por último, nos redirecciona a la página facturas para comprobar que se ha introducido
            header("Location: OrdenCompraTabla.php");
          
        } catch(PDOException $e) { //en el caso de un error se mostrará un mensaje
            echo "Error: " . $e->getMessage();
        }
        
    }
    

    function insertarOrdenCompra($conn, $fechaActual) {
        $sql = "INSERT INTO OrdenCompra (fecha) VALUES (:fecha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fecha', $fechaActual, PDO::PARAM_STR);
        $stmt->execute();
        $idDetalle = $conn->lastInsertId();
        return $idDetalle;
    }

    function insertarProducto($conn, $id_detalle, $producto, $cantidad) {
        $sql = "INSERT INTO OrdenCompraDetalle (id_detalle, id_producto, cantidad) VALUES (:id, :prod, :cant)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_detalle, PDO::PARAM_INT);
        $stmt->bindParam(':prod', $producto, PDO::PARAM_STR);
        $stmt->bindParam(':cant', $cantidad, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "bien";
        } else {
            header("Location: ../html/formulario.html");
        }
    }

?>