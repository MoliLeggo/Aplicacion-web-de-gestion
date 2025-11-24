<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro exitoso</title>
  <meta http-equiv="refresh" content="4;url=../iniSesion.php"> <!-- Redirige en 4 segundos "4; -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }
    .mensaje {
      text-align: center;
      padding: 2rem;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="mensaje">
    <h2 class="text-success">Registro exitoso</h2>
    <p>Serás redirigido al inicio de sesión en unos segundos...</p>
    <p><small>Si no eres redirigido automáticamente, <a href="../iniSesion.html">haz clic aquí</a>.</small></p>
  </div>
</body>
</html>
