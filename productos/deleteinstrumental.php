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

if (isset($_GET['id'])) {
    $id_instrumental = $_GET['id'];

    // Eliminar relaciones en la tabla `pertenecer`
    $sql = "DELETE FROM pertenecer WHERE ID_Instrumental = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_instrumental);
    $stmt->execute();

    // Eliminar la instrumental
    $sql = "DELETE FROM instrumentales WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_instrumental);
    $stmt->execute();

    echo "Instrumental eliminada correctamente.";
    header("Location: panel_de_control.php"); // Redirigir al panel de control
}

$conn->close();
?>