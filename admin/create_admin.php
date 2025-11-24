<?php
require 'db.php';
// Creacion de usuaro de un solo uso

$username = 'unico';
$password_plain = 'unico';

// Comprueba si ya existe
$stmt = $conn->prepare("SELECT id FROM admins WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo "Usuario ya existe.\n";
    exit;
}
$stmt->close();

// Hashea la contraseña
$hash = password_hash($password_plain, PASSWORD_DEFAULT);

// Inserta admin
$stmt = $conn->prepare("INSERT INTO admins (username, password_hash) VALUES (?, ?)");
$stmt->bind_param('ss', $username, $hash);
if ($stmt->execute()) {
    echo "Admin creado correctamente.\n";
} else {
    echo "Error: " . $stmt->error . "\n";
}
$stmt->close();
$conn->close();
// RECORDATORIO borrarlo o moverlo fuera del servidor público
?>