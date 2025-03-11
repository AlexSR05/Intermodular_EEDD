<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "intermodular";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_instrumental = $_POST['product_id'];
    $nuevo_titulo = $_POST['nuevo_titulo'];
    $nuevo_precio = $_POST['nuevo_precio'];

    // Actualizar la instrumental
    $sql = "UPDATE instrumentales SET Titulo = ?, precio = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $nuevo_titulo, $nuevo_precio, $id_instrumental);
    $stmt->execute();

    echo "Producto actualizado correctamente.";
    header("Location: panel_de_control.php"); // Redirigir al panel de control
}

$conn->close();
?>