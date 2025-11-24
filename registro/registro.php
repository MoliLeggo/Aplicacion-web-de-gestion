<?php

require '../admin/db.php';

$nombre = $_POST['name'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT); // Encripta la contraseña

$sql = "INSERT INTO usuarios (nombre, apellidos, email, clave) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nombre, $apellidos, $email, $clave);

if ($stmt->execute()) {
   
  header("Location: ../registro/registroExitoso.php");
  exit(); 
} else {
  echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
