<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'head.php'; ?>
</head>
<body>
    <?php include 'header.php'; ?>

<?php
require 'admin/db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicializa el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Añadir producto
if (isset($_GET['add'])) {
    $id = intval($_GET['add']);
    $_SESSION['carrito'][] = $id;
    header("Location: carrito.php");
    exit();
}

// Eliminar una unidad (quita solo una ocurrencia del ID)
if (isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    $index = array_search($id, $_SESSION['carrito']);
    if ($index !== false) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // reindexar
    }
    header("Location: carrito.php");
    exit();
}

// Vaciar completamente un producto (elimina todas sus ocurrencias)
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $_SESSION['carrito'] = array_filter($_SESSION['carrito'], function($prod) use ($id) {
        return $prod !== $id;
    });
    header("Location: carrito.php");
    exit();
}

// Vaciar toda la cesta
if (isset($_GET['empty'])) {
    $_SESSION['carrito'] = [];
    header("Location: carrito.php");
    exit();
}
?>
    <main class="container mt-5">
        <h2>🛒 Tu carrito de productos</h2>
        <?php if (empty($_SESSION['carrito'])): ?>
            <p>No hay productos en el carrito.</p>
        <?php else: ?>
            <ul class="list-group">
                <?php
                // Agrupar productos repetidos
                $conteo = array_count_values($_SESSION['carrito']);
                $total = 0;

                foreach ($conteo as $id => $cantidad):
                    $stmt = $conn->prepare("SELECT nombre, precio, imagen FROM productos WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                    $producto = $resultado->fetch_assoc();

                    if ($producto):
                        $subtotal = $producto['precio'] * $cantidad;
                        $total += $subtotal;
                ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?php echo htmlspecialchars($producto['nombre']); ?></strong><br>
                            Precio unitario: €<?php echo number_format($producto['precio'], 2); ?><br>
                            Cantidad: <?php echo $cantidad; ?><br>
                            Subtotal: €<?php echo number_format($subtotal, 2); ?><br>
                            <img src="<?php echo 'admin/' . htmlspecialchars($producto['imagen']); ?>" alt="Imagen" style="height: 50px;">
                        </div>
                        <div>
                            <a href="carrito.php?add=<?php echo $id; ?>" class="btn btn-sm btn-success">➕</a>
                            <a href="carrito.php?remove=<?php echo $id; ?>" class="btn btn-sm btn-warning">➖</a>
                            <a href="carrito.php?delete=<?php echo $id; ?>" class="btn btn-sm btn-danger">🗑️</a>
                        </div>
                    </li>
                <?php
                    endif;
                endforeach;
                ?>
            </ul>

            <div class="mt-4">
                <p><strong>Total a pagar:</strong> €<?php echo number_format($total, 2); ?></p>
                <a href="finalizarCompra.php" class="btn btn-success">Finalizar compra</a>
                <a href="carrito.php?empty" class="btn btn-danger ms-2">Vaciar cesta</a>
            </div>
        <?php endif; ?>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>