<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intermodular";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    die("Instrumental no encontrada.");
}

$id = $conn->real_escape_string($_GET['id']);

$sql = "SELECT i.Titulo, i.BPM, i.FechaCreacion, i.Imagen, i.audio, i.precio, 
        gm.Nombre AS Genero, prod.Nombre AS NombreProductor
        FROM instrumentales i
        JOIN pertenecer p ON i.ID = p.ID_Instrumental
        JOIN genero_musical gm ON p.ID_Genero = gm.ID
        JOIN productores prod ON prod.ID = i.ID_Productor
        WHERE i.ID = '$id'";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("<script> alert('No se ha podido encontrar la instrumental')</script>");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $row["Titulo"]; ?> - LoopLab</title>
    <link rel="icon" href="LogoPagina.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Spray+Paint&family=Chewy&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e1e2f;
            color: #f4f4f9;
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .product-card {
            display: flex;
            background: #2b2b40;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            width: 100%;
        }
        
        .product-info {
            flex: 1;
            padding-right: 20px;
        }
        
        .product-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .product-image img {
            max-width: 90%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }
        
        h2 {
            font-size: 30px;
            color: #ffd700;
        }
        
        button {
            background-color: #5757a9;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        
        button:hover {
            background-color: #3e3e71;
            transform: scale(1.05);
        }
        
        audio {
            width: 100%;
            margin-top: 10px;
        }
        h3{
            margin-right: 30px;
        }

        nav{
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        p{
            font-size: 22px;
        }
    </style>
</head>
<body>
    <nav>
        <h3 id="titulo-looplab">LoopLab</h3>
        <a href="instrumentales.php">Explorar más instrumentales</a>
        <a href="cart.html">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
        </svg>
        </a>
    </nav>
    
    <div class="container">
        <div class="product-card">
            <div class="product-info">
                <h2><?php echo $row["Titulo"]; ?></h2>
                <p><strong>Género:</strong> <?php echo $row["Genero"]; ?></p>
                <p><strong>BPM:</strong> <?php echo $row["BPM"]; ?></p>
                <p><strong>Productor:</strong> <?php echo $row["NombreProductor"]; ?></p>
                <p><strong>Precio:</strong> <?php echo number_format($row["precio"], 2, '.', ''); ?> €</p>
                <br><br>
                <audio controls>
                    <source src="<?php echo $row["audio"]; ?>" type="audio/mp3">
                    Tu navegador no soporta el audio.
                </audio>
                <br><br><br><br>
                <button class="add-to-cart" 
                    data-title="<?php echo $row['Titulo']; ?>" 
                    data-price="<?php echo number_format($row['precio'], 2, '.', ''); ?>" 
                    data-bpm="<?php echo $row['BPM']; ?>"
                    data-image="<?php echo $row['Imagen']; ?>">
                    Añadir al carrito
                </button>
            </div>
            <div class="product-image">
                <img src="<?php echo $row["Imagen"]; ?>" alt="Imagen de la instrumental">
            </div>
        </div>
    </div>
    
    <script>
        document.querySelector(".add-to-cart").addEventListener("click", (e) => {
            let boton = e.target;
            let titulo = boton.dataset.title;
            let precio = boton.dataset.price;
            let bpm = boton.dataset.bpm;
            let imagen = boton.dataset.image;

            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            carrito.push({ titulo, precio, bpm, imagen });

            localStorage.setItem("carrito", JSON.stringify(carrito));
            alert(`"${titulo}" ha sido añadida al carrito.`);
        });
    </script>
</body>
</html>

<?php $conn->close(); ?>
