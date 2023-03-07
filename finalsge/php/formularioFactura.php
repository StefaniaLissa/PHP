<?php
require ("db.php");

    //Se comprueba que todos los productos introducidos sean diferentes. Si no es así se mostrará un mensaje de error
    if($_GET['idProducto1']==$_GET['idProducto2'] || $_GET['idProducto1']==$_GET['idProducto3'] || $_GET['idProducto2']==$_GET['idProducto3']){
        echo '<p style="color:red;"> Error al realizar la factura. Introduce productos diferentes.</p>';
    }else{
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Seleccionamos la fecha actual
            $fechaActual = date("Y-m-d");
            
            //Guardamos el valor que nos retorna el método insertFacturas y a la vez se inserta la nueva factura en la tabla
            $id_detalle = insertarFacturas($conn, $fechaActual, $_GET['precioTotal'], $_GET['nombreProveedor']);
            
            //a la vez que se crea la factura, se inserta una fila en la tabla OrdenCompra con la factura creada anteriormente
            insertarHistorialCompra($conn,$id_detalle,$fechaActual);
            
            //insertamos los 3 productos introducidos
            insertarProducto($conn,$id_detalle,$_GET['idProducto1'],$_GET['cantidad1'],$_GET['precioU1']);
            insertarProducto($conn,$id_detalle,$_GET['idProducto2'],$_GET['cantidad2'],$_GET['precioU2']);
            insertarProducto($conn,$id_detalle,$_GET['idProducto3'],$_GET['cantidad3'],$_GET['precioU3']);

            //Al final, nos redirecciona a la pagina de facturas
            header("Location: FacturasTablas.php");
            
        } catch(PDOException $e) { //en el caso de un error se mostrará un mensaje
            echo "Error: " . $e->getMessage();
        }
        
    }
    
    function insertarProducto($conn, $id_detalle, $producto, $cantidad, $precio) {
        $sql = "INSERT INTO FacturaDetalle (ID_DETALLE, ID_PRODUCTO, PRECIO_UNITARIO, PRECIO_TOTAL, CANTIDAD) VALUES (:id, :prod, :preU, :preT, :cant)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_detalle, PDO::PARAM_INT);
        $stmt->bindParam(':prod', $producto, PDO::PARAM_STR);
        $stmt->bindParam(':preU', $precio, PDO::PARAM_STR);
        $precioTotal = ($precio*$cantidad);
        $stmt->bindParam(':preT', $precioTotal, PDO::PARAM_STR);
        $stmt->bindParam(':cant', $cantidad, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "bien";
        } else {
            header("Location: ../html/formularioFactura.html");
        }
    }

    function insertarHistorialCompra($conn, $id_detalle, $fechaActual) {
        $sql = "INSERT INTO HistorialCompras (ID_FACTURA, ID_VIAJE, FECHA) VALUES (:idF, :idV, :fecha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idF', $id_detalle, PDO::PARAM_INT);
        $idViaje = rand(0, 10);
        $stmt->bindParam(':idV', $idViaje, PDO::PARAM_INT);
        $stmt->bindParam(':fecha', $fechaActual, PDO::PARAM_STR);
        $stmt->execute();
    }

    function insertarFacturas($conn, $fechaActual, $importe, $nombreProveedor) {
        $sql = "INSERT INTO Facturas (FECHA,IMPORTE,NOMBRE_PROVEEDOR) VALUES (:fecha, :imp, :nombre)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fecha', $fechaActual, PDO::PARAM_STR);
        $stmt->bindParam(':imp', $importe, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombreProveedor, PDO::PARAM_STR);
        $stmt->execute();
        $idDetalle = $conn->lastInsertId();
        return $idDetalle;
        
    }
?>


