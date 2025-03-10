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
      body{
        margin: 40px;
      }
      input{
        width: 20%;
      }

      #precio{
        width: 5%;
      }

      h3{
        font-size: 40px;
      }

      #gestion-instrumentales{
        display: flex;
        flex-direction: column;
      }

      .lista-beats{
        color: white;
        text-decoration: none;
        background-color: red;
        padding: 3px;
        margin-left: 15px;
        border-radius: 10px;
      }
    </style>
</head>
<body>
    <h3>Panel de Control</h3>
    <nav>
        <ul>
            <li><a href="#gestion-instrumentales">Gestión de Instrumentales</a></li>
            <li><a href="#gestion-usuarios">Gestión de Usuarios</a></li>
            <li><a href="#gestion-productos">Gestión de Productos</a></li>
            <li><a href="../index/intermodular.php">Inicio</a></li>
        </ul>
    </nav>

    <section id="gestion-instrumentales">
        <h3>Gestión de Instrumentales</h3>
        <form action="addinstrumentales.php" method="post" enctype="multipart/form-data">
            <!-- Formulario para añadir instrumentales -->
            <input type="text" name="titulo" placeholder="Título" required>
            <br><br><br>
            <input type="number" name="bpm" placeholder="BPM" required>
            <br><br><br>
            <input type="text" name="productor" placeholder="Productor" required>
            <br><br><br>
            <select name="generos[]" multiple required>
                <!-- Opciones de géneros musicales -->
                <?php
                $conn = new mysqli("127.0.0.1", "root", "", "intermodular");
                $sql = "SELECT ID, Nombre FROM genero_musical";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['ID']}'>{$row['Nombre']}</option>";
                }
                ?>
            </select>
            <br><br><br>
            <input type="file" name="imagen" required>
            <br><br><br>
            <input type="file" name="audio" required>
            <br><br><br>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <br><br><br>
            <button type="submit">Añadir Instrumental</button>
        </form>

        <!-- Listado y opción para eliminar instrumentales -->
        <div>
            <h2>Listado de Instrumentales</h2>
            <?php
            $sql = "SELECT ID, Titulo FROM instrumentales";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<p>{$row['Titulo']} <a href='deleteinstrumental.php?id={$row['ID']}' class='lista-beats'>Eliminar</a></p>";
            }
            ?>
        </div>
    </section>

    <section id="gestion-usuarios">
        <h3>Gestión de Usuarios</h3>
        <div>
            <h2>Listado de Usuarios Registrados</h2>
            <?php
            $sql = "SELECT ID, Nombre, correo FROM usuarios";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<p>{$row['Nombre']} - {$row['correo']}</p>";
            }
            ?>
        </div>
    </section>

    <section id="gestion-productos">
<<<<<<< HEAD
        <h3>Gestión de Instrumentales (Modificar)</h3>
=======
        <h3>Gestión de Productos</h3>
>>>>>>> a1585a2d478378e0beec570d279e03181698a3de
        <form action="updateinstrumental.php" method="post">
            <!-- Formulario para modificar productos -->
            <select name="product_id" required>
                <?php
                $sql = "SELECT ID, Titulo FROM instrumentales";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['ID']}'>{$row['Titulo']}</option>";
                }
                ?>
            </select>
            <input type="text" name="nuevo_titulo" placeholder="Nuevo Título">
            <input type="number" name="nuevo_precio" placeholder="Nuevo Precio" step="0.01" min="0" required>
            <button type="submit">Modificar Producto</button>
        </form>
    </section>
</body>
</html>