<?php
session_start();
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
$contador_carrito = count($_SESSION['carrito']);
?>
<header class="header">
    <button class="hamburger" aria-label="Abrir menú">&#9776;</button>
    <div class="top-bar">
        <div class="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="Logo de la tienda">
            </a>
        </div>
        <h1 class="titulo">Mercería El Metro</h1>
        <div class="carrito">
            <a href="carrito.php">
                <i class="fas fa-shopping-cart"></i>
                <span class="contador"><?php echo $contador_carrito; ?></span>
            </a>
        </div>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="index.php">🏠</a></li>
            <li><a href="descripcion.php">QUIENES SOMOS</a></li>
            <li><a href="productos.php">PRODUCTOS</a></li>

            <li><a href="#contacto">CONTACTO</a></li>

            <?php if (isset($_SESSION['usuario_nombre'])): ?>
                <li><span class="me-3">👋 Hola,
                        <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></span></li>
                <li><a href="misPedidos.php" class="">MIS PEDIDOS</a></li>
                <li><a href="logout.php" class="">CERRAR SESION</a></li>
            <?php else: ?>
                <li><a href="iniSesion.php" class="">INICIAR SESION</a></li>
            <?php endif; ?>

        </ul>
    </nav>
</header>