<?php
// Incluir el archivo que contiene la conexión a la base de datos
include 'connection_db.php'; // Conectar a la base de datos

// Obtener el ID del producto desde la URL (método GET)
$id = $_GET['id']; // Se asume que el ID del producto se pasa como parámetro en la URL

// Verificar si el formulario fue enviado mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los nuevos valores del formulario
    $nombre = $_POST['nombre']; // Nombre del producto
    $categoria = $_POST['categoria']; // Categoría del producto
    $cantidad = $_POST['cantidad']; // Cantidad del producto

    // Usar sentencias preparadas para evitar inyección SQL
    // Se prepara la sentencia SQL para actualizar un producto en la tabla
    $stmt = $conn->prepare("UPDATE producto SET nombre=?, categoria=?, cantidad=? WHERE id=?");
    // Vincular los parámetros a la sentencia preparada
    // "ssii" indica que se esperan dos strings (nombre y categoría) y dos enteros (cantidad e ID)
    $stmt->bind_param("ssii", $nombre, $categoria, $cantidad, $id);
    
    // Ejecutar la sentencia preparada
    if ($stmt->execute()) {
        // Si la actualización fue exitosa, redirigir a la página principal
        header("Location: index.php"); // Redirigir a la página principal
        exit; // Finaliza la ejecución del script para evitar que se ejecute más código
    } else {
        // Si ocurre un error al ejecutar la sentencia, se muestra un mensaje de error
        echo "Error actualizando el producto: " . $stmt->error; // Mostrar el error específico de la ejecución
    }
    
    // Cerrar la sentencia preparada
    $stmt->close();
} else {
    // Obtener los datos actuales del producto si no se envió el formulario
    // Se prepara la consulta SQL para seleccionar los datos del producto según su ID
    $sql = "SELECT nombre, categoria, cantidad FROM producto WHERE id=?";
    $stmt = $conn->prepare($sql); // Preparar la sentencia SQL
    // Vincular el ID del producto como parámetro
    $stmt->bind_param("i", $id); // "i" indica que se espera un entero para el ID
    $stmt->execute(); // Ejecutar la sentencia

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();
    // Extraer los datos de la consulta en un arreglo asociativo
    $row = $result->fetch_assoc();

    // Cerrar la sentencia preparada
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="style.css"> <!-- Incluir el archivo CSS para estilos -->
</head>
<body>
<!-- Formulario para actualizar un producto -->
    <form method="post" action="" class="form-container">
        <h2>Actualizar Producto</h2>

        <label for="nombre">Nuevo Nombre:</label>
        <input type="text" id="nombre" value="<?php echo $row['nombre']; ?>" name="nombre" required> <!-- Campo para el nuevo nombre del producto -->

        <label for="categoria">Nueva Categoría:</label>
        <input type="text" id="categoria" value="<?php echo $row['categoria']; ?>" name="categoria" required> <!-- Campo para la nueva categoría del producto -->

        <label for="cantidad">Nueva Cantidad:</label>
        <input type="number" id="cantidad" value="<?php echo $row['cantidad']; ?>" name="cantidad" required> <!-- Campo para la nueva cantidad del producto -->

        <input type="submit" value="Actualizar Producto" class="submit-btn"> <!-- Botón para enviar el formulario -->
    </form>

</body>
</html>
