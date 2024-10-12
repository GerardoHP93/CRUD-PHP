<!-- HERRERA PACHECO GERARDO ISIDRO ISC 7° "B" 68612 -->

<?php
// Incluir el archivo de conexión a la base de datos, donde se establece la conexión
include 'connection_db.php'; // Conexión a la base de datos

// SQL para crear la tabla
// Se define la consulta SQL para crear una tabla llamada 'producto'.
// Esta tabla tendrá cuatro columnas:
// - id: un entero que se incrementará automáticamente y será la clave primaria.
// - nombre: un varchar de hasta 50 caracteres, que no puede ser nulo.
// - categoria: un varchar de hasta 50 caracteres, que también es obligatorio.
// - cantidad: un entero que representa la cantidad, que no puede ser nulo.
$sql = "CREATE TABLE producto (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nombre VARCHAR(50) NOT NULL,        
    categoria VARCHAR(50) NOT NULL,     
    cantidad INT NOT NULL
)";

// Ejecutar la consulta SQL para crear la tabla
// Aquí se utiliza el método 'query' del objeto de conexión $conn para ejecutar la consulta SQL definida anteriormente.
// Si la consulta se ejecuta correctamente, se enviará un mensaje de éxito.
// De lo contrario, se capturará el error utilizando $conn->error.
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'producto' creada con éxito"; // Mensaje de éxito si la tabla se crea correctamente
} else {
    // Mensaje de error en caso de que la tabla no se pueda crear.
    // Se utiliza $conn->error para obtener la descripción del error ocurrido.
    echo "Error creando la tabla: " . $conn->error; 
}

// Cerrar la conexión a la base de datos
// Es una buena práctica cerrar la conexión después de completar la operación para liberar recursos.
$conn->close();
?>

