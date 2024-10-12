<!-- HERRERA PACHECO GERARDO ISIDRO ISC 7° "B" 68612 -->

<?php
// Incluir el archivo para conectar a la base de datos
include 'connection_db.php'; 

// SQL para seleccionar todos los productos de la tabla 'producto'
$sql = "SELECT id, nombre, categoria, cantidad FROM producto";

// Ejecutar la consulta SQL y almacenar los resultados en la variable $result
$result = $conn->query($sql);

// Verificar si hay errores en la consulta
if ($result === FALSE) {
    die("Error en la consulta: " . $conn->error); // Detener el script si hay un error
}

// Devolver los resultados para su uso en otro archivo
return $result;

// Cerrar la conexión con la base de datos
$conn->close();
?>
