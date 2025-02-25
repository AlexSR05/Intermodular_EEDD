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
        
        $titulo = $_POST['titulo'];
        $bpm = $_POST['bpm'];
        $productor = $_POST['productor'];
        $generos = $_POST['generos'];
        $precio = $_POST['precio'];
        
        // Manejo de la imagen
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $ruta_imagen = "uploads/" . basename($imagen_nombre);
        move_uploaded_file($imagen_tmp, $ruta_imagen);
        
        // Manejo del archivo de audio
        $audio_nombre = $_FILES['audio']['name'];
        $audio_tmp = $_FILES['audio']['tmp_name'];
        $ruta_audio = "audiouploads/" . basename($audio_nombre);
        move_uploaded_file($audio_tmp, $ruta_audio);
        
        // Verificar si el productor ya existe
        $sql = "SELECT ID FROM productores WHERE Nombre = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $productor);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_productor = $row['ID'];
        } else {
            // Insertar el productor si no existe
            $sql = "INSERT INTO productores (Nombre) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $productor);
            $stmt->execute();
            $id_productor = $stmt->insert_id;
        }
        
        // Insertar instrumental con audio
        $sql = "INSERT INTO instrumentales (Titulo, BPM, FechaCreacion, ID_Productor, Imagen, audio, precio) VALUES (?, ?, CURDATE(), ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisssd", $titulo, $bpm, $id_productor, $ruta_imagen, $ruta_audio, $precio);
        $stmt->execute();
        $id_instrumental = $stmt->insert_id;
        
        // Insertar géneros
        foreach ($generos as $id_genero) {
            $sql = "INSERT INTO pertenecer (ID_Instrumental, ID_Genero) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $id_instrumental, $id_genero);
            $stmt->execute();
        }
        
        $conn->commit();
        echo "<script>alert('Instrumental registrada exitosamente'); window.location.href='tablainstrumentales.php';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>