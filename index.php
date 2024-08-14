<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butch 4k | Series y Peliculas en 4K</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="imagenes/12ada7e9-1883-4917-bac4-e1534b30ae1d.jpg" type="image/x-icon">
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
                    <input type="text" autocomplete="off" name="q" placeholder="Buscar..." value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </ul>
        <hr>
        <div class="slider">
            <div class="slides">
                <!-- Generar 15 slides -->
                <?php
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

                // Consulta para obtener las últimas 15 URLs de imágenes y sus ids
                $sql = "SELECT id, imagen, banner, titulo FROM contenido ORDER BY id DESC LIMIT 15";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // El enlace pasa el id a contenido.php
                        echo "<div class='slide'>
                            <a href='contenido.php?id=" . $row['id'] . "'>
                                <h2 class='h2_title'>" . htmlspecialchars($row['titulo']) . "</h2>
                                <img class='img_slider' src='" . $row['banner'] . "' alt='Imagen'>
                            </a>
                        </div>";
                    }
                } else {
                    echo "<p>No hay contenidos para mostrar.</p>";
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </div>
            <!-- Controles de navegación -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>

    <div class="cartas">
        <?php
        // Parámetros de conexión
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

        // Determinar la página actual
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $resultados_por_pagina = 48;
        $offset = ($pagina - 1) * $resultados_por_pagina;

        // Obtener el tipo y la búsqueda
        $tipo = isset($_GET['tipo']) ? $conn->real_escape_string($_GET['tipo']) : '';
        $search_query = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';

        // Construir la consulta SQL
        $sql = "SELECT id, imagen, titulo FROM contenido WHERE 1";

        // Filtrar por tipo si está presente
        if (!empty($tipo)) {
            $sql .= " AND tipo = '$tipo'";
        }

        // Filtrar por búsqueda si está presente
        if (!empty($search_query)) {
            $sql .= " AND (titulo LIKE '%$search_query%')";
        }

        // Añadir orden y paginación
        $sql .= " ORDER BY id DESC LIMIT $resultados_por_pagina OFFSET $offset";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='carta'>
                    <a href='contenido.php?id=" . $row['id'] . "'>
                        <img src='" . htmlspecialchars($row['imagen']) . "' alt='Imagen'>
                        <h4>" . htmlspecialchars($row['titulo']) . "</h4>
                    </a>
                </div>";
            }
        } else {
            echo "<p>No se encontraron resultados.</p>";
        }

        // Calcular el número total de páginas
        if (empty($search_query)) {
            $sql_total = "SELECT COUNT(*) AS total FROM contenido WHERE 1";
            if (!empty($tipo)) {
                $sql_total .= " AND tipo = '$tipo'";
            }
            $result_total = $conn->query($sql_total);
            $row_total = $result_total->fetch_assoc();
            $total_paginas = ceil($row_total['total'] / $resultados_por_pagina);
        } else {
            $total_paginas = 1; // No se paginan los resultados de búsqueda
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>

    <!-- Paginación -->
    <div class="paginacion">
        <?php
        if (empty($search_query)) { // No mostrar paginación en búsqueda
            if ($pagina > 1) {
                echo "<a href='?pagina=" . ($pagina - 1) . "&tipo=" . urlencode($tipo) . "'>&laquo; Anterior</a>";
            }

            for ($i = 1; $i <= $total_paginas; $i++) {
                if ($i == $pagina) {
                    echo "<a class='active' href='?pagina=$i&tipo=" . urlencode($tipo) . "'>$i</a>";
                } else {
                    echo "<a href='?pagina=$i&tipo=" . urlencode($tipo) . "'>$i</a>";
                }
            }

            if ($pagina < $total_paginas) {
                echo "<a href='?pagina=" . ($pagina + 1) . "&tipo=" . urlencode($tipo) . "'>Siguiente &raquo;</a>";
            }
        }
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
