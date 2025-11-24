<?php
session_start();
// Recoge el ID del producto desde la URL o formulario
$id_producto = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_producto > 0) {
  // Inicializa el carrito si no existe
  if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
  }

  // Añade el producto al carrito
  $_SESSION['carrito'][] = $id_producto;
}

header("Location: productos.php");
exit();
?>
