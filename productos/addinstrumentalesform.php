<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="LogoPagina.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Spray+Paint&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&family=Rubik+Spray+Paint&display=swap" rel="stylesheet">
    <title>Nueva Instrumental</title>
    <style>
      input{
        width: 20%;
      }

      #precio{
        width: 5%;
      }
    </style>
</head>
<body>
    <nav class="nav-secundario">
        <h3 id="titulo-looplab">LoopLab</h3>
        <a href="../index/index.php">Inicio</a>
    </nav>
    <br><br><br>
    <section id="registro" class="section">
        <h2>
            <svg
            xmlns="http://www.w3.org/2000/svg"
            width="18"
            height="18"
            fill="currentColor"
            class="bi bi-music-note"
            viewBox="0 0 16 16"
          >
            <path
              d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2"
            />
            <path fill-rule="evenodd" d="M9 3v10H8V3z" />
            <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5z" />
          </svg>
          Registro de Instrumental
        </h2>
        <form action="addinstrumentales.php" method="post" enctype="multipart/form-data">
          <label for="titulo"
            >Título Instrumental: <span style="color: red">*</span></label
          ><br /><br />
          <input type="text" id="titulo" name="titulo" required /><br /><br />

          <label for="bpm"
            >BPM: <span style="color: red">*</span></label
          ><br /><br />
          <input type="number" id="bpm" name="bpm" required /><br /><br />

          <label for="productor"
            >Producido por: <span style="color: red">*</span></label
          ><br /><br />
          <input
            type="text"
            id="productor"
            name="productor"
            required
          /><br /><br />

          <label for="generos"
            >Géneros: <span style="color: red">*</span></label
          ><br /><br />
          <select id="generos" name="generos[]" multiple required style="width: 30%; height: 200%; padding: 10px; text-align: left;">
            <?php
            $servername = "127.0.0.1";
            $username = "root"; 
            $password = "";
            $dbname = "intermodular";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT ID, Nombre FROM genero_musical";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?php print $row["ID"]; ?>"><?php print $row["Nombre"]; ?></option>
            <?php }
            }
            $conn->close();
            ?>
          </select><br /><br /><br>
          <label for="Imagen">Portada de la instrumental<span style="color: red"> *</span></label>
          <br><br>
          <input type="file" id="imagen" name="imagen" accept="image/" required>
          <br><br>
          <label for="Audio">Archivo de audio <i>(Debido al tamaño de los archivos de audio, se deberán subir utilizando el formato .mp3)</i><span style="color: red"> *</span></label>
          <br><br>
          <input type="file" id="audio" name="audio" accept="audio/*" required>
          <br><br>
          <label for="precio">Precio<span style="color: red"> *</span></label>
          <input type="number" id="precio" name="precio" min="0" step="0.01" placeholder="0.00" required>
          <br><br><br><br>
          <button type="submit">Añadir Instrumental</button>
        </form>
      </section>
</body>
</html>