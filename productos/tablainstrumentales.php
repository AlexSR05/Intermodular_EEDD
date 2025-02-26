<?php
$servername = "127.0.0.1";
$username = "root"; 
$password = "";
$dbname = "intermodular";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="LogoPagina.png" type="image/x-icon" />
    <link rel="stylesheet" href="../styles.css" />
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
    <title>Últimas instrumentales insertadas</title>
    <style>
        h2{
            font-family: "Rubik Spray Paint", serif;
            color: #ffd700;
            font-weight: 20;
        }

        body{
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }

        img{
            height: 30vh;
        }

        table{
           margin-left:23%;
           border: 5px;
           border-style: solid;
           border-color:rgb(73, 73, 106);
           border-radius: 40px;
        }

        tr td{
            padding: 20px;
            font-style: italic;
        }

        a{
            color: white;
            background-color: #4e4e9e;
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            transition: 1s;
        }

        a:hover{
            background-color:rgb(41, 41, 87);
            font-size: 16px;
            font-weight: bold;
        }

        th{
            padding: 10px;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <nav class="nav-secundario">
        <h3 id="titulo-looplab">LoopLab</h3>
        <a href="../index/intermodular.php">Inicio</a>
    </nav>
    <br><br><br>
    <h2>Últimas 10 Instrumentales insertadas</h2>
    <br>
    <?php
    // Mostrar las últimas 10 instrumentales
        $sql = "SELECT i.Titulo, i.BPM, p.Nombre as Productor, i.FechaCreacion, i.Imagen, i.precio FROM instrumentales i JOIN productores p ON i.ID_Productor = p.ID ORDER BY i.ID DESC LIMIT 10";
        $result = $conn->query($sql);

        echo "<table><tr><th>Portada</th><th>Título</th><th>BPM</th><th>Productor</th><th>Fecha</th><th>Precio</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='" . $row["Imagen"] . "' width='50' height='50'></td>";
            echo "<td>" . $row["Titulo"] . "</td>";
            echo "<td>" . $row["BPM"] . "</td>";
            echo "<td>" . $row["Productor"] . "</td>";
            echo "<td>" . $row["FechaCreacion"] . "</td>";
            echo "<td>" . $row["precio"] . "€</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <br><br>
    <a href="addinstrumentalesform.php">Insertar nueva instrumental</a>
</body>
</html>
<?php
$conn->close();
?>