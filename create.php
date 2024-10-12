<!-- HERRERA PACHECO GERARDO ISIDRO ISC 7° "B" 68612 -->

<?php
// Incluir el archivo que contiene la conexión a la base de datos
include 'connection_db.php'; // Conectar a la base de datos

// Verificar si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre']; // Nombre del producto
    $categoria = $_POST['categoria']; // Categoría del producto
    $cantidad = $_POST['cantidad']; // Cantidad del producto

    // Usar sentencias preparadas para evitar inyección SQL
    // Se prepara la sentencia SQL para insertar un nuevo producto en la tabla
    $stmt = $conn->prepare("INSERT INTO producto (nombre, categoria, cantidad) VALUES (?, ?, ?)");
    // Se vinculan los parámetros a la sentencia preparada
    // "ssi" indica que se espera un string, otro string, y un entero en el orden respectivo
    $stmt->bind_param("ssi", $nombre, $categoria, $cantidad);
    
    // Ejecutar la sentencia preparada
    if ($stmt->execute()) {
        // Si la inserción fue exitosa, redirigir a la página principal
        header("Location: index.php"); // Redirigir a la página principal
        exit; // Finaliza la ejecución del script para evitar que se ejecute más código
    } else {
        // Si ocurre un error al ejecutar la sentencia, se muestra un mensaje de error
        echo "Error: " . $stmt->error; // Mostrar el error específico de la ejecución
    }
    
    // Cerrar la sentencia preparada
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Producto</title>
    <link rel="stylesheet" href="style.css"> <!-- Incluir el archivo CSS para estilos -->
</head>
<body>
<!-- Formulario para insertar un nuevo producto -->
    <form method="post" action="" class="form-container">
        <h2>Insertar Nuevo Producto</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required> <!-- Campo para el nombre del producto -->

        <label for="categoria">Categoría:</label>
        <input type="text" id="categoria" name="categoria" required> <!-- Campo para la categoría del producto -->

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required> <!-- Campo para la cantidad del producto -->

        <input type="submit" value="Insertar Producto" class="submit-btn"> <!-- Botón para enviar el formulario -->
    </form>

</body>
</html>
