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
        
        $texto = $_POST['comentario'];
        $puntuacion = $_POST['puntuacion'];

        $sql = "INSERT INTO valoraciones (comentario, num_valoracion) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $texto, $puntuacion);
        $stmt->execute();

        $conn->commit();
        echo "<script>alert('¡Agradecemos tu valoración!'); window.location.href='intermodular.html';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>