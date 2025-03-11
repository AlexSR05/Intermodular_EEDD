<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "intermodular";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_instrumental = $_POST['product_id'];
    $nuevo_titulo = $_POST['nuevo_titulo'];
    $nuevo_precio = $_POST['nuevo_precio'];

    $conn->begin_transaction();

    try {
        $sql = "UPDATE instrumentales SET Titulo = ?, precio = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $nuevo_titulo, $nuevo_precio, $id_instrumental);
        $stmt->execute();

        $conn->commit();

        header("Location: panel_de_control.php");
        exit();
    } catch (Exception $e) {
        // Si ocurre algún error, revertir la transacción
        $conn->rollback();
        echo "<script> alert('Hubo un error al modificar la instrumental. Los cambios han sido revertidos.') </script>";
    }
}

$conn->close();
?>
