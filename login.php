<?php
session_start();
require 'admin/db.php';

// Recojo los datos del formulario
$email = $_POST['email'];
$clave = $_POST['clave'];

// Busco el usuario por email
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
  $usuario = $resultado->fetch_assoc();

  if (password_verify($clave, $usuario['clave'])) {
    // guardo datos de la sesion
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nombre'] = $usuario['nombre'];
    $_SESSION['usuario_email'] = $usuario['email'];
    header("Location: index.php");

  } else {
    echo "Contraseña incorrecta.";
  }
} else {
  echo "No se encontró una cuenta con ese correo.";
  header("Location: iniSesion.php");
}

$stmt->close();
$conn->close();
?>