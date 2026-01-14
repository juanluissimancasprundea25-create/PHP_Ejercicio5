<?php
$mensaje = '';
$clase = '';
if ($_POST) {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';
    $errores = [];
    // Que tenga comom minimo 8 caracteres
    if (strlen($password) < 8) {
        $errores[] = "El tamaño de la contraseña tiene que ser de 8 caracteres minimo";
    }
    // Que contenga un simbolo de @ o #
    if (strpos($password, '@') === false && strpos($password, '#') === false) {
        $errores[] = "Tiene que tener por lo menos una @ o un #";
    }
    // Que la contraseña NO sea igual al nombre del usuario
    if ($password === $usuario) {
        $errores[] = "La contraseña no puede ser igual al nombre de usuario.";
    }
    if (empty($errores)) {
        $mensaje = "La contraseña es segura";
        $clase = "exito";
    } else {
        $mensaje = "Error: " . implode(" ", $errores);
        $clase = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validador de contraseñas</title>
    <style>
        .exito { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Validador de contraseñas</h2>
    <form method="POST">
        Usuario: <input type="text" name="usuario" required><br><br>
        Contraseña: <input type="password" name="password" required><br><br>
        <button type="submit">Validar</button>
    </form>
    <?php if ($mensaje): ?>
        <p class="<?= $clase ?>"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>
</body>
</html>
