<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'head.php'; ?>
</head>
<body>
    <?php include 'header.php'; ?>
<?php

require 'admin/db.php';

if (empty($_SESSION['carrito'])) {
    header("Location: carrito.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'] ?? null;
if (!$usuario_id) {
    die("Debes iniciar sesión para finalizar la compra.");
}

$conteo = array_count_values($_SESSION['carrito']);

// Calcular el total
$total = 0;
foreach ($conteo as $id => $cantidad) {
    $stmt = $conn->prepare("SELECT precio FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $producto = $resultado->fetch_assoc();

    if ($producto) {
        $total += $producto['precio'] * $cantidad;
    }
}

// Insertar pedido en la tabla pedidos
$stmt = $conn->prepare("INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)");
$stmt->bind_param("id", $usuario_id, $total);
$stmt->execute();
$pedido_id = $stmt->insert_id;

// Insertar detalles en la tabla pedido_detalles
foreach ($conteo as $id => $cantidad) {
    $stmt = $conn->prepare("SELECT precio FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $producto = $resultado->fetch_assoc();

    if ($producto) {
        $precio_unitario = $producto['precio'];
        $stmt_detalle = $conn->prepare("INSERT INTO pedido_detalles (pedido_id, producto_id, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        $stmt_detalle->bind_param("iiid", $pedido_id, $id, $cantidad, $precio_unitario);
        $stmt_detalle->execute();
    }
}

// Vaciar carrito
$_SESSION['carrito'] = [];
?>
    <main class="container mt-5">
        <h2>Compra finalizada</h2>
        <p>Tu pedido #<?php echo $pedido_id; ?> ha sido registrado correctamente, en cuanto confirmemos existencias le enviaremos email con la factura.</p>
        <p>Total: €<?php echo number_format($total, 2); ?></p>
        <a href="productos.php" class="btn btn-primary">Volver a la tienda</a>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>