<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'head.php'; ?>
</head>
<?php

require 'admin/db.php';


// Obtener todas las categorías con su descripción
$categorias = [];
$resCat = $conn->query("SELECT nombre, descripcion FROM categorias ORDER BY nombre ASC");
while ($cat = $resCat->fetch_assoc()) {
    $categorias[strtolower($cat['nombre'])] = $cat['descripcion'];
}

// Obtener todos los productos
$productos = [];
$resProd = $conn->query("SELECT * FROM productos ORDER BY categoria ASC, nombre ASC");
while ($row = $resProd->fetch_assoc()) {
    $categoria = strtolower($row['categoria']);
    $productos[$categoria][] = $row;
}


?>

<body>
    <?php include 'header.php'; ?>
    <main>
        <?php foreach ($productos as $categoria => $items): ?>
            <section class="seccion3">
                <div class="textoSec3">
                    <h2 id="<?php echo htmlspecialchars($categoria); ?>">
                        <?php
                        // Mostrar la descripción de la categoría si existe en la tabla categorias
                        echo htmlspecialchars($categorias[$categoria] ?? ucfirst($categoria));
                        ?>
                    </h2>
                </div>
                <div class="solutions-container">
                    <?php foreach ($items as $producto): ?>
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo 'admin/' . $producto['imagen']; ?>" class="card-img-top"
                                alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <?php if (isset($_SESSION['usuario_id'])): ?>
                                    <p id="price"><?php echo number_format($producto['precio'], 2); ?> €</p>
                                    <a href="añadirCarrito.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary">Añadir al
                                        carrito</a>
                                <?php else: ?>
                                    <p><em>Inicia sesión para ver el precio</em></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>