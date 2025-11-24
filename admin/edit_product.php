<?php
session_start();
if (!isset($_SESSION['is_admin']))
    die("No tienes permisos.");
require 'db.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM productos WHERE id=$id");
$producto = $result->fetch_assoc();

if (!$producto)
    die("Producto no encontrado.");

// Procesar actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $categoria = $_POST['categoria'];

    $imagen_path = $producto['imagen'];
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir))
            mkdir($upload_dir, 0777, true);

        $imagen_path = $upload_dir . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_path);
    }

    $stmt = $conn->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, imagen=?, categoria=? WHERE id=?");
    $stmt->bind_param("ssdssi", $nombre, $descripcion, $precio, $imagen_path, $categoria, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
    exit;
}
?>

<h2>Editar Producto</h2>
<form method="POST" enctype="multipart/form-data">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required><br><br>
    <label>Descripción:</label>
    <textarea name="descripcion" rows="4"><?php echo htmlspecialchars($producto['descripcion']); ?></textarea><br><br>
    <label>Precio:</label>
    <input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required><br><br>

    <?php $cats = $conn->query("SELECT nombre FROM categorias ORDER BY nombre ASC"); ?>
    <label>Categoría:</label>
    <select name="categoria" required>
        <?php while ($c = $cats->fetch_assoc()):
            $nombreCat = $c['nombre'];
            $sel = ($producto['categoria'] === $nombreCat) ? 'selected' : '';
            ?>
            <option value="<?php echo htmlspecialchars($nombreCat); ?>" <?php echo $sel; ?>>
                <?php echo htmlspecialchars(ucfirst($nombreCat)); ?>
            </option>
        <?php endwhile; ?>
        <!-- <option value="babero" < ?php if($producto['categoria']=="babero") echo "selected"; ?>>Babero</option>
        <option value="etiquetas" < ?php if($producto['categoria']=="etiquetas") echo "selected"; ?>>Etiquetas</option>
        <option value="costurero" < ?php if($producto['categoria']=="costurero") echo "selected"; ?>>Costurero</option>
        <option value="parches" < ?php if($producto['categoria']=="parches") echo "selected"; ?>>Parches</option>
        <option value="puntillas" < ?php if($producto['categoria']=="puntillas") echo "selected"; ?>>Puntillas</option>
        <option value="pasamaneria" < ?php if($producto['categoria']=="pasamaneria") echo "selected"; ?>>Pasamanería</option>
        <option value="hilos" < ?php if($producto['categoria']=="hilos") echo "selected"; ?>>Hilos</option>
        <option value="botones" < ?php if($producto['categoria']=="botones") echo "selected"; ?>>Botones</option> -->
    </select>
    <br><br>

    <label>Imagen:</label>
    <input type="file" name="imagen" accept="image/*"><br>
    <?php if ($producto['imagen']): ?>
        <img src="<?php echo $producto['imagen']; ?>" width="100" alt="">
    <?php endif; ?><br><br>
    <button type="submit">Actualizar Producto</button>
</form>