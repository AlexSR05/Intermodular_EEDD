<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "intermodular";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id_instrumental = $_GET['id'];

    $conn->begin_transaction();

    try {
        $sql = "DELETE FROM pertenecer WHERE ID_Instrumental = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_instrumental);
        $stmt->execute();

        $sql = "DELETE FROM instrumentales WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_instrumental);
        $stmt->execute();

        $conn->commit();

        echo "<script> alert ('Instrumental eliminada correctamente.') </script>";
        header("Location: panel_de_control.php"); 
        exit(); 
    } catch (Exception $e) {
        $conn->rollback();
        echo "<script> alert('Hubo un error al eliminar la instrumental. Los cambios han sido revertidos.') </script>";
    }
}

$conn->close();
?>
