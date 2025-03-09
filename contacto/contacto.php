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
    try {
        $conn->begin_transaction();
        
        $email = $_POST['correo'];

        $sql = "INSERT INTO contacto VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $conn->commit();
        echo "<script>alert('Gracias por ponerte en contacto con nosotros.'); window.location.href='../index/intermodular.php';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
