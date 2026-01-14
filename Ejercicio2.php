<?php
// Parte de php
$peliculas = [
    ["titulo" => "Big Hero 6", "genero" => "Accion", "edad_minima" => 16],
    ["titulo" => "La mascara", "genero" => "Comedia", "edad_minima" => 13],
    ["titulo" => "Deadpool", "genero" => "Accion", "edad_minima" => 18],
    ["titulo" => "Solo en casa", "genero" => "Comedia", "edad_minima" => 16],
    ["titulo" => "Spiderman", "genero" => "Accion", "edad_minima" => 15]
];
$resultados = [];
$generoSeleccionado = $_POST['genero'] ?? '';
if ($generoSeleccionado) {
    foreach ($peliculas as $peli) {
        if ($peli['genero'] === $generoSeleccionado) {
            $resultados[] = $peli;
        }
    }
}
?>
<!-- Parte html --> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de peliculas</title>
</head>
<body>
    <h2>Buscador de peliculas</h2>
    <form method="POST">
        Genero:
        <select name="genero" required>
            <option value=""> Selecciona </option>
            <option value="Accion" <?= $generoSeleccionado === 'Accion' ? 'selected' : '' ?>>Accion</option>
            <option value="Comedia" <?= $generoSeleccionado === 'Comedia' ? 'selected' : '' ?>>Comedia</option>
        </select>
        <button type="submit">Buscar</button>
    </form>
    <!-- Volvemos con la parte php --> 
    <?php if ($generoSeleccionado): ?>
        <?php if (count($resultados) > 0): ?>
            <?php foreach ($resultados as $peli): ?>
                <div class="tarjeta">
                    <strong><?= htmlspecialchars($peli['titulo']) ?></strong><br>
                    <em><?= htmlspecialchars($peli['genero']) ?></em> La edad minima es de : <?= $peli['edad_minima'] ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Ese genero no lo tenemos , sorry T.T</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
