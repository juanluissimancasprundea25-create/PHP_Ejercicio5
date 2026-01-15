<?php
$fraseHackeada = "";
if ($_POST) {
    $frase = $_POST['frase'] ?? '';
    $buscar = ['A', 'E', 'I', 'O', 'S'];
    $reemplazar = ['4', '3', '1', '0', '5'];
    $fraseHackeada = str_ireplace($buscar, $reemplazar, $frase);
}
?>
<!-- Parte html -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encriptador hacker</title>
</head>
<body>
    <h2>Encriptador hacker</h2>
    <form method="POST">
        <textarea name="frase" rows="4" cols="50" placeholder="Escribe la frase que quieres hackear" required></textarea><br><br>
        <button type="submit">Hackear</button>
    </form>
<!--Parte de php en la que realizamos la sustitucion de lo que escribimos -->
    <?php if ($fraseHackeada): ?>
        <h3>La frase hackeada es:</h3>
        <p><strong><?= htmlspecialchars($fraseHackeada) ?></strong></p>
    <?php endif; ?>
</body>
</html>
