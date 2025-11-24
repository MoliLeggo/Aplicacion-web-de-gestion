<?php
session_start();
if (!isset($_SESSION['is_admin'])) die("No tienes permisos.");

require 'db.php';

$id = intval($_GET['id']);
$conn->query("DELETE FROM productos WHERE id=$id");
header("Location: admin.php");
exit;
?>