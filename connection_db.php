<!-- HERRERA PACHECO GERARDO ISIDRO ISC 7° "B" 68612 PROGRAMACIÓN DE APLICACIONES WEB-->

<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos (generalmente "localhost" para bases de datos en el mismo servidor)
$username = "root"; // Nombre de usuario para conectarse a la base de datos (root es común en entornos locales)
$password = ""; // Contraseña para el usuario de la base de datos (generalmente vacía en entornos locales)
$dbname = "tienda"; // Nombre de la base de datos a la que se desea conectar

// Crear la conexión usando la extensión MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    // Si ocurre un error al intentar conectar, se muestra un mensaje y se detiene la ejecución del script
    die("Conexión fallida: " . $conn->connect_error);
}
?>
