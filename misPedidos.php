<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'head.php'; ?>
</head>
<body>
    <?php include 'header.php'; ?>
<?php

require 'admin/db.php';

// Verificar que el usuario está logueado
$usuario_id = $_SESSION['usuario_id'] ?? null;
if (!$usuario_id) {
    header("Location: iniSesion.php");
    exit();
}
// Obtener todos los pedidos del usuario
$stmt = $conn->prepare("SELECT id, fecha, total FROM pedidos WHERE usuario_id = ? ORDER BY fecha DESC");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$pedidos = $stmt->get_result();
?>
    <main class="container mt-5">
        <h2>Mis pedidos</h2>

        <?php if ($pedidos->num_rows === 0): ?>
            <p>No has realizado ningún pedido todavía.</p>
        <?php else: ?>
            <?php while ($pedido = $pedidos->fetch_assoc()): ?>
                <div class="card mb-4 no-hover">
                    <div class="card-header">
                        <strong>Pedido #<?php echo $pedido['id']; ?></strong>  
                        | Fecha: <?php echo $pedido['fecha']; ?>  
                        | Total: €<?php echo number_format($pedido['total'], 2); ?>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            // Obtener detalles de este pedido
                            $stmt_det = $conn->prepare("
                                SELECT pd.producto_id, pd.cantidad, pd.precio_unitario, p.nombre 
                                FROM pedido_detalles pd 
                                JOIN productos p ON pd.producto_id = p.id 
                                WHERE pd.pedido_id = ?
                            ");
                            $stmt_det->bind_param("i", $pedido['id']);
                            $stmt_det->execute();
                            $detalles = $stmt_det->get_result();

                            while ($detalle = $detalles->fetch_assoc()):
                                $subtotal = $detalle['cantidad'] * $detalle['precio_unitario'];
                            ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong><?php echo htmlspecialchars($detalle['nombre']); ?></strong><br>
                                        Precio unitario: €<?php echo number_format($detalle['precio_unitario'], 2); ?><br>
                                        Cantidad: <?php echo $detalle['cantidad']; ?><br>
                                        Subtotal: €<?php echo number_format($subtotal, 2); ?>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>