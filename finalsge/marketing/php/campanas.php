<?php 
require('verificacion.php');
require 'header.php'; ?>

<h1>Campañas de Marketing</h1>

	<!-- Botón para agregar nueva campaña -->
	<button onclick="mostrarFormulario()">Agregar Nueva Campaña</button>

    <?php
        // Conexión a la base de datos
        require("./db.php");

        // Consulta para obtener todas las campañas
        $consulta = $conn->prepare("SELECT * FROM Campañas");
        $consulta->execute();

        // Mostrar la tabla de campañas
        echo '<table>';
        echo '<thead><tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Presupuesto</th><th>Estado</th><th>Acciones</th></tr></thead>';
        echo '<tbody id="tabla-campanas">';
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>'.$fila['ID'].'</td>';
            echo '<td>'.$fila['Nombre'].'</td>';
            echo '<td>'.$fila['Descripción'].'</td>';
            echo '<td>'.$fila['Fecha Inicio'].'</td>';
            echo '<td>'.$fila['Fecha Fin'].'</td>';
            echo '<td>'.$fila['Presupuesto'].'</td>';
            echo '<td>'.$fila['Estado'].'</td>';
            echo '<td>
                    <button onclick="editarCampana('.$fila['ID'].')">Editar</button>
                    <button onclick="eliminarCampana('.$fila['ID'].')">Eliminar</button>
                  </td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

    ?>


	<!-- Formulario para agregar nueva campaña -->
	<form method="POST" id="formulario" style="display:none;">
		<h2>Nueva Campaña</h2>
		<label>Nombre:</label>
		<input type="text" name="nombre" required><br><br>
		<label>Descripción:</label>
		<input type="text" name="descripcion" required><br><br>
		<label>Fecha de inicio:</label>
		<input type="date" name="fecha_inicio" required><br><br>
		<label>Fecha de fin:</label>
		<input type="date" name="fecha_fin" required><br><br>
		<label>Presupuesto:</label>
		<input type="number" name="presupuesto" required><br><br>
		<label>Estado:</label>
		<select name="estado" required>
			<option value="Activa">Activa</option>
			<option value="Inactiva">Inactiva</option>
			<option value="Pendiente">Pendiente</option>
		</select><br><br>
		<input type="submit" value="Agregar Campaña">
	</form>


	<!-- Script para mostrar/ocultar formulario nueva campaña -->
	<script>
		function mostrarFormulario() {
			var formulario = document.getElementById("formulario");
			if (formulario.style.display === "none") {
				formulario.style.display = "block";
			} else {
				formulario.style.display = "none";
			}
		}
	</script>


<?php require 'footer.php'; ?>

<?php 

// Verificar si el formulario de agregar campaña fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = date_create($_POST['fecha_inicio'])->format('Y-m-d');
    $fecha_fin = date_create($_POST['fecha_fin'])->format('Y-m-d');
    $presupuesto = $_POST['presupuesto'];
    $estado = $_POST['estado'];



    // Insertar la nueva campaña en la base de datos
    $stmt = $conn->prepare("INSERT INTO Campañas (Nombre, Descripción, `Fecha Inicio`, `Fecha Fin`, Presupuesto, Estado) VALUES (:nombre, :descripcion, :fecha_inicio, :fecha_fin, :presupuesto, :estado)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha_inicio', $fecha_inicio);
    $stmt->bindParam(':fecha_fin', $fecha_fin);
    $stmt->bindParam(':presupuesto', $presupuesto);
    $stmt->bindParam(':estado', $estado);
    $stmt->execute();

    // obtener el ID de la última campaña insertada
    $nueva_campana_id = $conn->lastInsertId();

    // obtener la información de la nueva campaña de la base de datos
    $sql = "SELECT * FROM Campañas WHERE ID = :id";
    $consulta = $conn->prepare($sql);
    $consulta->bindParam(':id', $nueva_campana_id);
    $consulta->execute();
    $nueva_campana = $consulta->fetch(PDO::FETCH_ASSOC);

    // construir la nueva fila de la tabla HTML
    $nueva_fila = '<tr>';
    $nueva_fila .= '<td>'.$nueva_campana['ID'].'</td>';
    $nueva_fila .= '<td>'.$nueva_campana['Nombre'].'</td>';
    $nueva_fila .= '<td>'.$nueva_campana['Descripción'].'</td>';
    $nueva_fila .= '<td>'.$nueva_campana['Fecha Inicio'].'</td>';
    $nueva_fila .= '<td>'.$nueva_campana['Fecha Fin'].'</td>';
    $nueva_fila .= '<td>'.$nueva_campana['Presupuesto'].'</td>';
    $nueva_fila .= '<td>'.$nueva_campana['Estado'].'</td>';
    $nueva_fila .= '<td>';
    $nueva_fila .= '<button>Editar</button>';
    $nueva_fila .= '<button>Eliminar</button>';
    $nueva_fila .= '</td>';
    $nueva_fila .= '</tr>';


    echo '<script>';
    echo 'var tabla = document.getElementById("tabla-campanas");';
    echo 'tabla.insertAdjacentHTML("beforeend", "'.$nueva_fila.'");';
    echo '</script>';

}
?>
