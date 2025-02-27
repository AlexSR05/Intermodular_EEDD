<?php
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
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contrasenya = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (Nombre, correo, telefono, contrasenya) VALUES ('$nombre', '$correo', '$telefono', '$contrasenya')";

if ($conn->query($sql) === TRUE) {
  echo "Registro exitoso";
  header("Location: login_form.php"); // Redirigir al usuario a la página de inicio de sesión
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>