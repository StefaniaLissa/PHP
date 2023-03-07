<?php
require('verificacion.php');
require("./db.php");

// Recuperar el ID de la campaña a editar
if (!isset($_GET['id'])) {
    header("Location: campanas.php");
    exit;
}
$id_campana = $_GET['id'];

// Consultar los datos actuales de la campaña
$stmt = $conn->prepare("SELECT * FROM Campañas WHERE ID = :id_campana");
$stmt->bindParam(':id_campana', $id_campana);
$stmt->execute();
$fila = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$fila) {
    // Si la campaña no existe, redirigir a la lista de campañas
    header("Location: campanas.php");
    exit;
}

// Mostrar el formulario para editar la campaña
echo '<form method="POST">';
echo '<h2>Editar Campaña</h2>';
echo '<label>Nombre:</label>';
echo '<input type="text" name="nombre" value="'.$fila['Nombre'].'" required><br><br>';
echo '<label>Descripción:</label>';
echo '<input type="text" name="descripcion" value="'.$fila['Descripción'].'" required><br><br>';
echo '<label>Fecha de inicio:</label>';
echo '<input type="date" name="fecha_inicio" value="'.$fila['Fecha Inicio'].'" required><br><br>';
echo '<label>Fecha de fin:</label>';
echo '<input type="date" name="fecha_fin" value="'.$fila['Fecha Fin'].'" required><br><br>';
echo '<label>Presupuesto:</label>';
echo '<input type="number" name="presupuesto" value="'.$fila['Presupuesto'].'" required><br><br>';
echo '<label>Estado:</label>';
echo '<select name="estado" required>';
echo '<option value="Activa"'.($fila['Estado'] == 'Activa' ? ' selected' : '').'>Activa</option>';
echo '<option value="Inactiva"'.($fila['Estado'] == 'Inactiva' ? ' selected' : '').'>Inactiva</option>';
echo '<option value="Pendiente"'.($fila['Estado'] == 'Pendiente' ? ' selected' : '').'>Pendiente</option>';
echo '</select><br><br>';
echo '<input type="submit" value="Guardar">';
echo '</form>';

// Verificar si el formulario de edición fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = date_create($_POST['fecha_inicio'])->format('Y-m-d');
    $fecha_fin = date_create($_POST['fecha_fin'])->format('Y-m-d');
    $presupuesto = $_POST['presupuesto'];
    $estado = $_POST['estado'];

    // Actualizar los datos de la campaña en la base de datos
    $stmt = $conn->prepare("UPDATE Campañas SET Nombre = :nombre, Descripción = :descripcion, `Fecha Inicio` = :fecha_inicio, `Fecha Fin` = :fecha_fin, Presupuesto = :presupuesto, Estado = :estado WHERE ID = :id_campana");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha_inicio', $fecha_inicio);
    $stmt->bindParam(':fecha_fin', $fecha_fin);
    $stmt->bindParam(':presupuesto', $presupuesto);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id_campana', $id_campana);
    $stmt->execute();

    // Cerrar la ventana después de guardar los cambios
    echo '<script>window.close();
            window.addEventListener(\'unload\', function() {
                window.opener.location.reload();
            });
        </script>';
}

?>
