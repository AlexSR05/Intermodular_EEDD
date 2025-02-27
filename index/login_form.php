<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="icon" href="LogoPagina.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+Spray+Paint&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Chewy&family=Rubik+Spray+Paint&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
          font-family: 'Poppins', sans-serif;
          margin: 0;
          padding: 0;
          background-color: #1e1e2f;
          color: #f4f4f9;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
      }
      .section {
          background: #2b2b40;
          padding: 1rem 4rem;
          border-radius: 12px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
          width: 100%;
          max-width: 400px;
          text-align: center;
      }
      h2 {
          color: #ffffff;
          font-size: 20px;
      }
      label {
          display: block;
          text-align: left;
          margin-top: 10px;
      }
      input {
          width: 90%;
          padding: 10px;
          margin-top: 5px;
          border-radius: 5px;
          border: none;
          font-size: 1rem;
      }
      button {
          background-color: #5757a9;
          color: white;
          border: none;
          padding: 12px;
          border-radius: 8px;
          cursor: pointer;
          margin-top: 15px;
          width: 100%;
          font-size: 1rem;
          transition: background-color 0.3s ease;
      }
      button:hover {
          background-color: #3e3e71;
      }
      .option-register {
        font-size: 12px;
      }
      #login {
        color: #a7a7e1;
      }
      h3 {
        font-size: 30px;
        color: rgb(255, 230, 0);
        font-family: "Rubik Spray Paint", serif;
        font-weight: 200;
      }
      .forgot-your-password {
        opacity: 0.8;
        font-size: 10px;
        color: #a7a7e1;
      }
      .forgot-your-password-div {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
        text-align: left;
      }
  </style>
</head>
<body>
    <section class="section">
      <h3>LoopLab</h3>
        <h2>Inicia Sesión</h2>
        <form action="login.php" method="POST">
            <br>
            <label for="correo">Correo Electrónico: <span style="color: red">*</span></label>
            <input type="email" id="correo" name="correo" required>
            <br><br>
            <div class="forgot-your-password-div">
              <label for="contraseña">Contraseña: <span style="color: red">*</span></label>
              <a class="forgot-your-password" href="">¿Has olvidado tu contraseña?</a>
            </div>
            <input type="password" id="contraseña" name="contraseña" required>
            <?php
            if (isset($_SESSION['error_contrasenya']) && $_SESSION['error_contrasenya'] != "") {
                echo "<p class='error'>" . $_SESSION['error_contrasenya'] . "</p>";
                $_SESSION['error_contrasenya'] = ""; // Limpiar error después de mostrarlo
            }
            ?>
            <?php
            if (isset($_SESSION['error_usuario']) && $_SESSION['error_usuario'] != "") {
                echo "<p class='error'>" . $_SESSION['error_usuario'] . "</p>";
                $_SESSION['error_usuario'] = ""; // Limpiar error después de mostrarlo
            }
            ?>
            <br><br><br>
            <button type="submit">Iniciar Sesión</button>
            <p class="option-register">¿No tienes una cuenta? <a href="registro.html" id="login">Registrate aquí</a></p>
        </form>
    </section>
</body>
</html>
