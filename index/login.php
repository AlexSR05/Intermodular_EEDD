<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root"; // Cambia esto por tu usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "intermodular";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar variables de error en la sesión
$_SESSION['error_contrasenya'] = "";
$_SESSION['error_usuario'] = "";

// Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['correo']) && isset($_POST['contraseña'])) {
    $correo = $conn->real_escape_string($_POST['correo']);
    $contrasenya = $_POST['contraseña'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($contrasenya, $row['contrasenya'])) {
            // Iniciar sesión y redirigir
            $_SESSION['usuario'] = $row['Nombre'];
            header("Location: intermodular.php");
            exit();
        } else {
            $_SESSION['error_contrasenya'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error_usuario'] = "Usuario no encontrado.";
    }
}

// Cerrar conexión
$conn->close();

// Redirigir de vuelta a la página del formulario
header("Location: login_form.php");
exit();
?>
