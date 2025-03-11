<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        h3 {
            font-size: 22px;
            color: #333;
        }

        h4 {
            font-size: 28px;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background: #333;
            color: white;
        }
        td {
            color: black;
        }
        tr:nth-child(odd) td {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) td {
            background-color: #e6e6e6;
        }
        input, select, button {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #218838;
        }
        .lista-beats {
            color: white;
            text-decoration: none;
            background-color: red;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h4>Panel de Control</h4>
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
            <input type="text" name="titulo" placeholder="Título" required>
            <input type="number" name="bpm" placeholder="BPM" required>
            <input type="text" name="productor" placeholder="Productor" required>
            <select name="generos[]" multiple required>
                <?php
                $conn = new mysqli("127.0.0.1", "root", "", "intermodular");
                $sql = "SELECT ID, Nombre FROM genero_musical";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['ID']}'>{$row['Nombre']}</option>";
                }
                ?>
            </select>
            <input type="file" name="imagen" required>
            <input type="file" name="audio" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <button type="submit">Añadir Instrumental</button>
        </form>
        
        <h2>Listado de Instrumentales</h2>
        <table>
            <tr>
                <th>Título</th>
                <th>Acción</th>
            </tr>
            <?php
            $sql = "SELECT ID, Titulo FROM instrumentales";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Titulo']}</td><td><a href='deleteinstrumental.php?id={$row['ID']}' class='lista-beats'>Eliminar</a></td></tr>";
            }
            ?>
        </table>
    </section>
    
    <section id="gestion-usuarios">
        <h3>Gestión de Usuarios</h3>
        <h2>Listado de Usuarios Registrados</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
            <?php
            $sql = "SELECT ID, Nombre, correo FROM usuarios";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['Nombre']}</td><td>{$row['correo']}</td></tr>";
            }
            ?>
        </table>
    </section>
    
    <section id="gestion-productos">
        <h3>Gestión de Instrumentales (Modificar)</h3>
        <form action="updateinstrumental.php" method="post">
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