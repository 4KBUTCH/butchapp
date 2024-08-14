<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{Titulo}</title>
    <link rel="stylesheet" href="contenido.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
<div class="NAVEGACION">
    <ul>
        <a href="index.php" class="titulo">BUTCHER 4k</a><br>
        <a href="#" class="bread"><li>PELICULAS</li></a>
        <a href="#" class="bread"><li>SERIES</li></a>
        <a href="#" class="bread"><li>ANIMES</li></a>
        <input type="text" class="buscador" placeholder="Buscar...">
    </ul>
    <hr>
</div>

<div class="container">
    <img src="{img}" alt="" class="poster">
    <div class="info">
        <h2>{Titulo}</h2><br>
        <p>Sinopsis</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui numquam cupiditate, nemo ad itaque soluta fugit accusantium similique, quis obcaecati, blanditiis possimus necessitatibus ea praesentium explicabo architecto nostrum facilis suscipit!</p>
    </div>
</div>


<div class="link">
    <a href="">
        <img src="data:image/png;base64,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"></img>
</a>        
</div>