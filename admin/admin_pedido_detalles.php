<?php
session_start();
if (!isset($_SESSION['is_admin'])) {
    die("No tienes permisos.");
}
require 'db.php';

$id = intval($_GET['id']);

$sql = "
    SELECT d.producto_id, pr.nombre AS producto, d.cantidad, d.precio_unitario
    FROM pedido_detalles d
    JOIN productos pr ON d.producto_id = pr.id
    WHERE d.pedido_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>
<body style="background-color: aquamarine;">
<h2>Detalles del pedido #<?php echo $id; ?></h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Subtotal</th>
    </tr>
    
<p>
    <a href="admin_pedidos.php" class="btn btn-secondary">Volver a pedidos</a>
</p>
    <?php while ($d = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($d['producto']); ?></td>
            <td><?php echo $d['cantidad']; ?></td>
            <td><?php echo number_format($d['precio_unitario'], 2); ?> €</td>
            <td><?php echo number_format($d['cantidad'] * $d['precio_unitario'], 2); ?> €</td>
        </tr>
    <?php endwhile; ?>
</table>
</body>