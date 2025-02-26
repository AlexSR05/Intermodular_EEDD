<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intermodular";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrumentales</title>

    <link rel="icon" href="LogoPagina.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Spray+Paint&family=Chewy&display=swap" rel="stylesheet">

    <style>
        .instrumental {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgb(50, 50, 99);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 5px 5px 18px rgba(0, 0, 0, 0.45);
            width: 100%;
            max-width: 300px;
            margin: 15px auto;
            text-align: center;
            height: auto;
            object-fit: cover;
        }

        .instrumental ul {
            list-style-type: none;
            padding: 10px;
            margin: 0;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
            width: 100%;
            line-height: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(50px, 3fr));
            justify-self: center;
            gap: 10px;
        }

        .instrumental ul li {
            padding: 5px 0;
            font-size: 14px;
            text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.3);
        }

        .instrumental img {
            width: 250px;
            height: 250px;
            object-fit: cover; 
            border-radius: 5px;
            margin-top: 20px;
        }

        .instrumental audio {
            margin-top: 20px;
            width: 100%;
        }

        .precio-carrito{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            gap: 100px;
            margin-top: 20px;
            align-items: center;
        }

        img{
            opacity: 1;
            transition: 0.8s ease-in-out;
        }

        img:hover{
            scale: 1.01;
        }

        #instrumental-date{
            font-size: 0.8em;
        }

        .button-48 {
            appearance: none;
            background-color: #FFFFFF;
            border-width: 0;
            box-sizing: border-box;
            color:rgb(83, 83, 145);
            cursor: pointer;
            display: inline-block;
            font-family: Clarkson, Helvetica, sans-serif;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 0;
            line-height: 1em;
            margin: 0;
            opacity: 1;
            outline: 0;
            padding: 1.5em 2.2em;
            position: relative;
            text-align: center;
            text-decoration: none;
            text-rendering: geometricprecision;
            text-transform: uppercase;
            transition: opacity 600ms cubic-bezier(.694, 0, 0.335, 1), background-color 300ms cubic-bezier(.694, 0, 0.335, 1), color 800ms cubic-bezier(.694, 0, 0.335, 1);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            white-space: nowrap;
            letter-spacing: 1px;
        }

        .button-48:before {
            background-color:rgb(81, 81, 163);
            clip-path: polygon(-1% 0, 0 0, -25% 100%, -1% 100%);
            content: "";
            height: 101%;
            left: 0;
            position: absolute;
            top: 0;
            transform: translateZ(0);
            transition: clip-path 1.5s cubic-bezier(.165, 0.84, 0.44, 1), -webkit-clip-path 1.5s cubic-bezier(.165, 0.84, 0.44, 1);
            width: 101%;
            border-radius: 5px;
        }

        .button-48:hover:before {
            clip-path: polygon(0 0, 101% 0, 101% 101%, 0 101%);
        }

        .button-48:after {
            content: "Instrumental Seleccionada";
            text-align: center;
            font-size: 6px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity, scale 1s ease-out;
            color: white;
        }

        .button-48:hover:after {
            opacity: 1;
            scale: 1.05;
        }

        .button-48 span {
            z-index: 1;
            position: relative;
        }

        form {
    text-align: center;
    margin-bottom: 20px;
        }

        input {
            padding: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 15px;
            background-color: #535391;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #414176;
        }

        .flex-titulo-buscador {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .search-button{
            background-color: transparent;
        }

        #input-searcher{
            -webkit-box-shadow: 0px 5px 5px 1px rgba(0,0,0,0.37);
            -moz-box-shadow: 0px 5px 5px 1px rgba(0,0,0,0.37);
            box-shadow: 0px 5px 5px 1px rgba(0,0,0,0.37);
        }

        .no-result-inicio{
            text-decoration: none;
            color: white;
            background: color
        }

        #instrumentales{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        padding: 10px;
        }

        .custom-audio {
            width: 95%;
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg);
            opacity: 0.9;
        }

        .custom-audio:hover {
            opacity: 1;
        }
    </style>
</head>
<body>

<nav class="nav-secundario">
    <h3 id="titulo-looplab">LoopLab</h3>
    <a href="../index/intermodular.php">Inicio</a>
    <a href="cart.html">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
        </svg>
    </a>
</nav>
<br><br><br>
<section class="section">
    <div class="flex-titulo-buscador">
        <div>
            <h2>Instrumentales Disponibles</h2>
            <p class="instrumental-desc">Explora nuestra colección de instrumentales organizadas por géneros y encuentra la ideal para tu nuevo Single, Álbum o EP.</p>
        </div>

        <div class="searcher">
            <form method="GET" action="instrumentales.php">
                <input type="text" name="search" placeholder="Buscar instrumental por nombre, género..." id="input-searcher"required>
                <button type="submit" class="search-button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg></button>
            </form>
        </div>
    </div>

    <div id="instrumentales">
        <?php
        $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

        $sql = "
            SELECT 
                i.Titulo, 
                i.BPM, 
                i.FechaCreacion, 
                i.Imagen,
                i.audio,
                i.precio,
                gm.Nombre AS Genero,
                prod.Nombre AS NombreProductor
            FROM 
                instrumentales i
            JOIN 
                pertenecer p ON i.ID = p.ID_Instrumental
            JOIN 
                genero_musical gm ON p.ID_Genero = gm.ID
            JOIN 
                productores prod ON prod.ID = i.ID_Productor
            WHERE 
                i.Titulo LIKE '%$search%' 
                OR gm.Nombre LIKE '%$search%'
                OR prod.Nombre LIKE '%$search%'
                OR i.BPM LIKE '%$search%';
        ";

        $result = $conn->query($sql);?>
        <?php if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <div class="instrumental">
                    <ul>
                        <li><strong>Título:</strong> <br><i><?php echo $row["Titulo"]; ?></i></li>
                        <li><strong>BPM:</strong> <br><i><?php echo $row["BPM"]; ?></i></li>
                        <li><strong>Género:</strong> <br><i><?php echo $row["Genero"]; ?></i></li>
                    </ul>
                    <img src="<?php echo $row["Imagen"];?>" alt="Imagen de la instrumental no encontrada.">
                    <p><strong><u style=
                        "font-family: 'Rubik Spray Paint', serif;
                        color: #ffd700;
                        font-weight: 20;
                        letter-spacing: 1px">
                        Made By:</u></strong><br><br><i><?php echo $row["NombreProductor"]; ?></i></p>
                    <p id="instrumental-date"><i><?php echo $row["FechaCreacion"]; ?></i></p>
                    <audio controls class="custom-audio" oncontextmenu="return false;">
                        <source src="<?php echo $row["audio"];?>" type="audio/mp3">
                        No se ha podido cargar o tu navegador no soporta el elemento de audio.
                    </audio>
                    <div class="precio-carrito">
                        <p style="font-family: Clarkson, Helvetica, sans-serif;font-size: 14px; margin: 10px;"><b>Precio:</b><br><?php echo number_format($row["precio"], 2, '.', '');?> €</p>
                        <button class="button-48" 
                            data-title="<?php echo $row['Titulo']; ?>" 
                            data-price="<?php echo number_format($row['precio'], 2, '.', ''); ?>" 
                            data-bpm="<?php echo $row['BPM']; ?>"
                            data-image="<?php echo $row['Imagen']; ?>">
                            Añadir al carrito
                        </button>
                    </div>
                </div> 
        <?php }} else {
             echo "<h3 style='font-size: 14px;'> No se han encontrado instrumentales relativas a tu búsqueda.</h3>";
        } ?>
    </div>

</section>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const botones = document.querySelectorAll(".button-48");

        botones.forEach(boton => {
            boton.addEventListener("click", () => {
                let titulo = boton.dataset.title;
                let precio = parseFloat(boton.dataset.price).toFixed(2);
                let bpm = boton.dataset.bpm;
                let imagen = boton.dataset.image;

                let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
                carrito.push({ titulo, precio, bpm, imagen });

                localStorage.setItem("carrito", JSON.stringify(carrito));

                alert(`"${titulo}" ha sido añadida al carrito.`);
            });
        });
    });
    </script>
</body>
</html>

<?php $conn->close(); ?>
