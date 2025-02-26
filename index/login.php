<?php
session_start();

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

// Recoger datos del formulario
$correo = $_POST['correo'];
$contrasenya = $_POST['contraseña'];

// Buscar el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE correo='$correo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if (password_verify($contrasenya, $row['contrasenya'])) {
    // Iniciar sesión
    $_SESSION['usuario'] = $row['Nombre'];
    header("Location: intermodular.php"); // Redirigir al usuario a la página principal
  } else {
    echo "<script> alert('Contraseña incorrecta')</script>";
  }
} else {
    echo "<script> alert('Usuario no encontrado')</script>";
}

$conn->close();
?>