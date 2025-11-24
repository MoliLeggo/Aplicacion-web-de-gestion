<?php
$host = 'localhost';
$db   = 'merceria';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);
?>