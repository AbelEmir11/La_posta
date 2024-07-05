<?php
// Datos de conexión
$servername = "localhost";
$username = "root"; // Usuario por defecto en XAMPP
$password = "";     // Contraseña por defecto en XAMPP (vacía)
$dbname = "tienda_artesanal";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta básica: obtiene todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$productos = array();

if ($result->num_rows > 0) {
    // Guardar cada fila en un array
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Devolver los datos como JSON
echo json_encode($productos);

$conn->close();
?>
