<!-- <!DOCTYPE html>
<html lang="es">
<head>
    < ?php include '../headAdmin.php'; ?>
</head>
<body>
    < ?php include '../header.php'; ?> -->
<?php
session_start();
if (!isset($_SESSION['is_admin']))
    die("No tienes permisos.");
require 'db.php';

// Alta de categoría
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'add') {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    if ($nombre !== '') {
        $stmt = $conn->prepare("INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $descripcion);
        $stmt->execute();
        $stmt->close();
    }
    header("Location: admin_categorias.php");
    exit;
}

// --- Editar categoría ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'edit') {
    $id = intval($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $stmt = $conn->prepare("UPDATE categorias SET nombre=?, descripcion=? WHERE id=?");
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_categorias.php");
    exit;
}
// --- Borrar categoría ---
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM categorias WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_categorias.php");
    exit;
}

// Listado
$cats = $conn->query("SELECT * FROM categorias ORDER BY nombre ASC");
?>



<h2>Administración de categorías</h2>

<h3>Añadir nueva categoría</h3>
<form method="POST">
    <!-- añado value para diferenciar el añadir del editar -->
    <input type="hidden" name="accion" value="add">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>
    <label>Descripción:</label>
    <textarea name="descripcion" rows="3"></textarea><br><br>
    <button type="submit">Añadir categoría</button>
</form>

<hr>

<h3>Categorías existentes</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    <?php while ($cat = $cats->fetch_assoc()): ?>
        <tr>
            <td><?php echo $cat['id']; ?></td>
            <td><?php echo htmlspecialchars($cat['nombre']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($cat['descripcion'])); ?></td>

            <td>
                <form method="POST" style="display:inline-block;">
                    <input type="hidden" name="accion" value="edit">
                    <input type="hidden" name="id" value="<?php echo $cat['id']; ?>">
                    <input type="text" name="nombre" value="<?php echo htmlspecialchars($cat['nombre']); ?>" required>
                    <input type="text" name="descripcion" value="<?php echo htmlspecialchars($cat['descripcion']); ?>">
                    <button type="submit" class="btn btn-warning btn-sm">Editar categoría</button>
                </form>
                <a href="admin_categorias.php?delete=<?php echo $cat['id']; ?>"
                    onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>

</html>