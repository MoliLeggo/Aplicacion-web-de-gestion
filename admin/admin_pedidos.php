<?php
session_start();
if (!isset($_SESSION['is_admin'])) {
    die("No tienes permisos.");
}
require 'db.php';

// Traer pedidos con el nombre del usuario
$sql = "
    SELECT p.id, p.fecha, p.total, u.nombre AS cliente
    FROM pedidos p
    JOIN usuarios u ON p.usuario_id = u.id
    ORDER BY p.fecha DESC
";
$pedidos = $conn->query($sql);
?>
<body style="background-color: aquamarine;">
<h2>Administración de pedidos</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID Pedido</th>
        <th>Cliente</th>
        <th>Fecha</th>
        <th>Total</th>
        <th>Acciones</th>
    </tr>
    <p>
    <a href="admin.php" class="btn btn-secondary">Volver a productos</a>
</p>
    <?php while ($p = $pedidos->fetch_assoc()): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo htmlspecialchars($p['cliente']); ?></td>
            <td><?php echo $p['fecha']; ?></td>
            <td><?php echo number_format($p['total'], 2); ?> €</td>
            <td>
                <a href="admin_pedido_detalles.php?id=<?php echo $p['id']; ?>">Ver detalles</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>