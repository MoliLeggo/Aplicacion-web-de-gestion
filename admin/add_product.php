<?php
session_start();
if (!isset($_SESSION['is_admin'])) die("No tienes permisos.");

require 'db.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$categoria = $_POST['categoria'];

$imagen_path = null;

if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0){
    $upload_dir = 'uploads/';
    if(!is_dir($upload_dir)) mkdir($upload_dir,0777,true);

    $imagen_path = $upload_dir . basename($_FILES['imagen']['name']);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_path);
}

$stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, imagen, categoria) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssds", $nombre, $descripcion, $precio, $imagen_path, $categoria);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: admin.php");
exit;
?>