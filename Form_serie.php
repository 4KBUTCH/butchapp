<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Temporadas y Episodios</title>
</head>
<body>
    <h2>Agregar Temporadas y Episodios</h2>
    <form action="procesar_temporadas.php" method="POST">
        <label for="id_contenido">ID del Contenido:</label>
        <input type="number" id="id_contenido" name="id_contenido" required><br><br>

        <label for="num_temporadas">Número de Temporadas:</label>
        <input type="number" id="num_temporadas" name="num_temporadas" min="1" required><br><br>

        <div id="episodiosPorTemporada"></div>

        <button type="submit">Guardar Temporadas y Episodios</button>
    </form>

    <script>
        document.getElementById('num_temporadas').addEventListener('input', function() {
            const numTemporadas = this.value;
            const episodiosDiv = document.getElementById('episodiosPorTemporada');
            episodiosDiv.innerHTML = '';

            for (let i = 1; i <= numTemporadas; i++) {
                episodiosDiv.innerHTML += `<label for="temporada_${i}">Número de Episodios para Temporada ${i}:</label>
                                           <input type="number" id="temporada_${i}" name="episodios_temporada[]" min="1" required><br><br>`;
            }
        });
    </script>
</body>
</html>
