<!-- HERRERA PACHECO GERARDO ISIDRO ISC 7° "B" 68612 -->

<?php
$servername = "localhost";
$username = "root"; // Usuario por defecto en XAMPP
$password = ""; // Contraseña por defecto en XAMPP es vacía

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// SQL para crear la base de datos, yo cree uno llamado tienda
$sql = "CREATE DATABASE tienda"; // 
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada con éxito";
} else {
    echo "Error creando la base de datos: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
