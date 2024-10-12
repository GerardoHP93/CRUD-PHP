<?php
// Incluir el archivo para conectar a la base de datos
include 'connection_db.php'; 

// Incluir el archivo que contiene la lógica para realizar la operación de lectura
// Esto devuelve el resultado de la consulta a la tabla 'producto'
$result = include 'read.php'; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda - Productos</title>
    <link rel="stylesheet" href="style.css"> <!-- Enlace al archivo CSS para estilos -->

    <!-- La función confirmDelete() muestra un cuadro de confirmación utilizando confirm(). Este método devuelve true si el usuario hace clic en "Aceptar" y false si hace clic en "Cancelar". --> 
    <script>
        function confirmDelete() {
            // Muestra un cuadro de confirmación al usuario
            return confirm("¿Estás seguro de que deseas eliminar este producto?");
        }
    </script>
</head>
<body>
    <!-- Título principal de la página -->
    <h1>CRUD para una tabla Productos</h1>

    <!-- Enlace para redirigir a la página 'create.php', donde se insertan nuevos productos -->
    <a href="create.php" class="btn btn-insertar">Insertar Producto</a>
    
    <!-- Tabla para mostrar los productos que están en la base de datos -->
    <table>
        <thead>
            <tr>
                <!-- Definir los encabezados de la tabla -->
                <th>ID</th> <!-- Encabezado para el ID del producto -->
                <th>Nombre</th> <!-- Encabezado para el nombre del producto -->
                <th>Categoría</th> <!-- Encabezado para la categoría del producto -->
                <th>Cantidad</th> <!-- Encabezado para la cantidad del producto -->
                <th>Operaciones</th> <!-- Columna para mostrar las acciones (actualizar/eliminar) -->
            </tr>
        </thead>
        <tbody>
        <?php
        // Verificar si hay registros en la consulta (si hay productos en la base de datos)
        if ($result->num_rows > 0) {
            // Si hay productos, iterar sobre cada uno
            while($row = $result->fetch_assoc()) {
                // Mostrar una fila en la tabla por cada producto
                echo "<tr>
                    <td>{$row['id']}</td> <!-- Mostrar el ID del producto -->
                    <td>{$row['nombre']}</td> <!-- Mostrar el nombre del producto -->
                    <td>{$row['categoria']}</td> <!-- Mostrar la categoría del producto -->
                    <td>{$row['cantidad']}</td> <!-- Mostrar la cantidad del producto -->
                    <td>
                        <!-- Botón para actualizar el producto, redirige a 'update.php' con el ID del producto -->
                        <a href='update.php?id={$row['id']}' class='btn'>Actualizar</a>
                        
                        <!-- Botón para eliminar el producto, redirige a 'delete.php' con el ID del producto-->
                        <!--El atributo onclick en el enlace de eliminación llama a la función confirmDelete().-->

                        <a href='delete.php?id={$row['id']}' class='btn btn-danger' onclick='return confirmDelete();'>Eliminar</a>
                    </td>
                </tr>";
            }
        } else {
            // Si no hay productos en la base de datos, mostrar un mensaje en la tabla
            echo "<tr><td colspan='5'>No hay productos en la base de datos</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Cerrar la conexión con la base de datos
$conn->close(); // Finaliza la conexión a la base de datos, liberando recursos
?>
