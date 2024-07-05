<?php
// para conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_artesanal";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$categoria = $_POST['categoria'];

// Insertar el producto en la base de datos
$sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria) VALUES ('$nombre', '$descripcion', $precio, $stock, '$categoria')";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado exitosamente";
    header("Refresh: 4; url=productos.html")
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . '<br> <a href="productos.html">Volver atr&aacute;s</a>';
}

$conn->close();
?>
