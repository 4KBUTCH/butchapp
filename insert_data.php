<?php
   $servername = "bwhqc5cftc7zsyq5sebk-mysql.services.clever-cloud.com";
   $username = "urknyohzus09os9g";
   $password = "TRIoRczcotVE3pF9pl26";
   $dbname = "bwhqc5cftc7zsyq5sebk";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtén los datos del formulario
$titulo = $_POST['titulo'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$imagen = $_POST['imagen'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$banner = $_POST['banner'] ?? ''; 
$tamano = $_POST['tamano'] ?? ''; 
$url_paste = $_POST['url_paste'] ?? ''; // Nuevo campo para el enlace

// Prepara y ejecuta la consulta SQL
$sql = "INSERT INTO contenido (titulo, tipo, imagen, descripcion, banner, tamano, url_paste) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $titulo, $tipo, $imagen, $descripcion, $banner, $tamano, $url_paste);

if ($stmt->execute()) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $stmt->error;
}

// Cierra la conexión
$stmt->close();
$conn->close();
?>
