<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/12ada7e9-1883-4917-bac4-e1534b30ae1d.jpg" type="image/x-icon">

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $servername = "bwhqc5cftc7zsyq5sebk-mysql.services.clever-cloud.com";
        $username = "urknyohzus09os9g";
        $password = "TRIoRczcotVE3pF9pl26";
        $dbname = "bwhqc5cftc7zsyq5sebk";

        // Crear una conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener el título del contenido basado en el id
        $sql = "SELECT titulo FROM contenido WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $titulo = htmlspecialchars($row['titulo']);
            echo "<title>Descargar $titulo | 4K</title>";
        } else {
            echo "<title>Contenido no encontrado</title>";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "<title>ID no válido</title>";
    }
    ?>
    <link rel="stylesheet" href="contenido.css">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="NAVEGACION">
        <ul class="nava">
            <li><a href="index.php" class="titulo">BUTCHER 4k</a></li>
            <li><a href="index.php?tipo=pelicula" class="bread">PELICULAS</a></li>
            <li><a href="index.php?tipo=serie" class="bread">SERIES</a></li>
            <li><a href="index.php?tipo=anime" class="bread">ANIMES</a></li>
            <div class="buscador">
                <form action="index.php" method="GET">
                    <input autocomplete="off" type="text" name="q" placeholder="Buscar..." value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </ul>
</div>
       
        <hr>
    <div class="contenido-detalle">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $servername = "bwhqc5cftc7zsyq5sebk-mysql.services.clever-cloud.com";
        $username = "urknyohzus09os9g";
        $password = "TRIoRczcotVE3pF9pl26";
        $dbname = "bwhqc5cftc7zsyq5sebk";

            // Crear una conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta para obtener los detalles del contenido basado en el id
            $sql = "SELECT * FROM contenido WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='container'>";
                echo "<img class='poster' src='" . htmlspecialchars($row['imagen']) . "' alt='Imagen del Contenido'>";
                echo "<div class='info'>";
                echo "<h2>" . htmlspecialchars($row['titulo']) . "</h2>";
                echo "<p class='desc'>" . htmlspecialchars($row['descripcion']) . "</p>";
                echo "</div>";
                echo "</div>";

                // Mostrar la ficha técnica
                echo "<div class='Ficha_tecnica'>";
                echo "<h3>DATOS</h3>";
                echo "<p><b>Titulo:</b> " . htmlspecialchars($row['titulo']) . "</p>";
                echo "<p><b>Formato:</b> MKV</p>";
                echo "<p><b>Calidad:</b> 2160P</p>";
                echo "<p>Audio: Latino | Inglés</p>";
                echo "<p>Subtítulos: Español | Inglés</p>";
                echo "<p>Tamaño: " . htmlspecialchars($row['tamano']) . "</p>";
                echo "<p>Contraseña: t.me/PYS4K</p>";
                echo "</div>";

                // Obtener la URL y aplicarla a la etiqueta <a>
                $url_paste = htmlspecialchars($row['url_paste']);
                echo "<div>";
                echo "<a href='$url_paste'><img class='enlace' src='https://i.namu.wiki/i/-_jHjnu9XVi4K3rBANcTxQFoNHnT6E96PZE9erYShWHPzhkypObayaWBRJYrtSLhhM3B-G1Qe0ZZmzKIyYfMfw.webp' alt=''></a>";
                echo "</div>";

            } else {
                echo "<p>No se encontró el contenido.</p>";
            }

            // Cerrar la conexión
            $stmt->close();
            $conn->close();
        } else {
            echo "<p>ID no válido.</p>";
        }
        ?>
    </div>
</body>
</html>
