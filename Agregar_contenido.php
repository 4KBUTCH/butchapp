<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contenido</title>
</head>
<body>
    
<form action="insert_data.php" method="POST">
    <h1>Agregar contenido</h1>
    <p>Título</p>
    <input type="text" name="titulo" id="titulo" placeholder="Título" required>
    
    <p>Tipo</p>
    <select name="tipo" id="tipo" required>
        <option value="SERIE">SERIE</option>
        <option value="PELICULA">PELÍCULA</option>
        <option value="ANIME">ANIME</option>
    </select>
    
    <p>Imagen</p>
    <input type="url" name="imagen" id="imagen" placeholder="Imagen URL" required>
    
    <p>Descripción</p>
    <input type="text" name="descripcion" placeholder="Descripción" required>
    
    <p>Banner</p>
    <input type="text" name="banner" placeholder="Banner" required>
    
    <p>Tamaño</p>
    <input type="text" name="tamano" placeholder="Tamaño" required>
    
    <p>Enlace (URL Paste)</p>
    <input type="url" name="url_paste" id="url_paste" placeholder="URL del enlace" required>
    
    <button type="submit">Enviar</button>
</form>

</body>
</html>
