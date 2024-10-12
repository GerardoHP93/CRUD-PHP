<!-- HERRERA PACHECO GERARDO ISIDRO ISC 7° "B" 68612 -->

<?php
// Incluir el archivo que contiene la conexión a la base de datos
include 'connection_db.php'; // Conectar a la base de datos

// Obtener el ID del producto desde la URL (método GET)
$id = $_GET['id']; // Se asume que el ID del producto se pasa como parámetro en la URL

// Usar sentencias preparadas para evitar inyección SQL
// Preparar la sentencia SQL para eliminar un producto de la tabla
$stmt = $conn->prepare("DELETE FROM producto WHERE id=?");
// Vincular el parámetro a la sentencia preparada
// "i" indica que se espera un entero para el ID
$stmt->bind_param("i", $id);

// Ejecutar la sentencia preparada
if ($stmt->execute()) {
    // Si la eliminación fue exitosa, redirigir a la página principal
    header("Location: index.php"); // Redirigir a la página principal
    exit; // Finaliza la ejecución del script para evitar que se ejecute más código
} else {
    // Si ocurre un error al ejecutar la sentencia, se muestra un mensaje de error
    echo "Error eliminando el producto: " . $stmt->error; // Mostrar el error específico de la ejecución
}

// Cerrar la sentencia preparada
$stmt->close();
?>

