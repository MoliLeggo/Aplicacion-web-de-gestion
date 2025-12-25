<?php
session_start();
require 'db.php';

// Si ya está logueado redirigir
if (!empty($_SESSION['is_admin'])) {
    header('Location: admin.php');
    exit;
}

// CSRF token sencillo
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = 'Token inválido.';
    } else {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === '' || $password === '') {
            $errors[] = 'Introduce usuario y contraseña.';
        } else {
            $stmt = $conn->prepare("SELECT id, password_hash FROM admins WHERE username = ?");
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->bind_result($id, $password_hash);
            if ($stmt->fetch()) {
                if (password_verify($password, $password_hash)) {
                    session_regenerate_id(true);
                    $_SESSION['is_admin'] = true;
                    $_SESSION['admin_id'] = $id;
                    $_SESSION['admin_user'] = $username;
                    header('Location: admin.php');
                    exit;
                } else {
                    $errors[] = 'Usuario o contraseña incorrectos.';
                }
            } else {
                $errors[] = 'Usuario o contraseña incorrectos.';
            }
            $stmt->close();
        }
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login Admin</title>
</head>

<body style="background-color: aquamarine;">
    <h1>Administrador de la aplicacion</h1>
    <h3>Login</h3>
    <?php if ($errors): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $err)
                echo "<li>" . htmlspecialchars($err) . "</li>"; ?>
        </ul>
    <?php endif; ?>
    <form method="post" action="">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <label>Usuario<br><input type="text" name="username" required></label><br><br>
        <label>Contraseña<br><input type="password" name="password" required></label><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>