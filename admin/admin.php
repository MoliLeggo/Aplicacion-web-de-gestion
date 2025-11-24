<?php
session_start();
// verifica si el administrador en este caso is_admin es el que a iniciado sesion en loginAdmin.php
if (!isset($_SESSION['is_admin'])) {
    die("No tienes permisos para acceder.");
}
require 'db.php';

// Obtener todos los productos
$result = $conn->query("SELECT * FROM productos ORDER BY fecha_creacion DESC");
?>

<h2>Administración de Productos</h2>

<p>
    <a href="admin_categorias.php" class="btn btn-secondary">Añadir / Editar Categorías</a>
</p>
<!-- Formulario para añadir producto -->
<h3>Añadir Producto</h3>
<form action="add_product.php" method="POST" enctype="multipart/form-data">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>
    <label>Descripción:</label>
    <textarea name="descripcion" rows="4"></textarea><br><br>
    <label>Precio:</label>
    <input type="number" name="precio" step="0.01" required><br><br>


    <?php
    $cats = $conn->query("SELECT nombre FROM categorias ORDER BY nombre ASC");
    ?>
    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria" required>
        <?php while ($c = $cats->fetch_assoc()): ?>
            <option value="<?php echo htmlspecialchars($c['nombre']); ?>">
                <?php echo htmlspecialchars(ucfirst($c['nombre'])); ?>
            </option>
        <?php endwhile; ?>
        <!-- <option value="babero">Babero</option>
        <option value="etiquetas">Etiquetas</option>
        <option value="costurero">Costurero</option>
        <option value="parches">Parches</option>
        <option value="puntillas">Puntillas</option>
        <option value="pasamaneria">Pasamanería</option>
        <option value="hilos">Hilos</option>
        <option value="botones">Botones</option> -->
    </select><br><br>

    <label>Imagen:</label>
    <input type="file" name="imagen" accept="image/*"><br><br>
    <button type="submit">Añadir Producto</button>
    <p><a href="logoutAdmin.php">Cerrar sesión</a></p>
</form>

<hr>

<h3>Productos Existentes</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>

        <th>Categoría</th>

        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>

            <td><?php echo htmlspecialchars($row['categoria']); ?></td>

            <td>
                <?php if ($row['imagen']): ?>
                    <img src="<?php echo $row['imagen']; ?>" width="50" alt="">
                <?php endif; ?>
            </td>
            <td><?php echo number_format($row['precio'], 2); ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $row['id']; ?>">Editar</a> |
                <a href="delete_product.php?id=<?php echo $row['id']; ?>"
                    onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>