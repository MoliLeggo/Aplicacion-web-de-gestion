<?php
require 'db.php';
$result = $conn->query("SELECT * FROM productos ORDER BY fecha_creacion DESC");
?>

<h2>Productos</h2>
<div class="productos-grid" style="display:flex; flex-wrap:wrap; gap:20px;">
<?php while($row = $result->fetch_assoc()): ?>
    <div class="producto" style="border:1px solid #ccc; padding:10px; width:200px;">
        <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
        <?php if($row['imagen']): ?>
            <img src="<?php echo $row['imagen']; ?>" style="width:100%;" alt="">
        <?php endif; ?>
        <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
        <p>Precio: $<?php echo number_format($row['precio'],2); ?></p>
    </div>
<?php endwhile; ?>
</div>
<!-- Panel admin seguro (necesita login).
Crear, editar y eliminar productos.
Mostrar productos en la web pública en tarjetas. -->