<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bombo de la loteria</title>
</head>
<body>
    <!-- Esta es la parte html -->
    <h2>Bombo de la loteria</h2>
    <form method="POST">
        ¿Cuantos numeros quieres sacar? <input type="number" name="cantidad" min="1" max="100" required><br><br>
        ¿Rango maximo? <input type="number" name="rango" min="1" max="1000" required><br><br>
        <button type="submit">Generar</button>
    </form>
    <?php
    // Parte php con condiciones si pones un valor que no se puede poner o uno que supera el limite que he puesto
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cantidad = (int)$_POST['cantidad'];
        $rango = (int)$_POST['rango'];
        if ($cantidad > $rango) {
            echo "<p style='color:red;'>No puedes pedir una catidad superior a la que se puede</p>";
        } elseif ($cantidad <= 0 || $rango <= 0) {
            echo "<p style='color:red;'>Ese no vale</p>";
        } else {
            $numeros = [];
            while (count($numeros) < $cantidad) {
                $nuevo = rand(1, $rango);
                if (!in_array($nuevo, $numeros)) {
                    $numeros[] = $nuevo;
                }
            }
            sort($numeros);
            echo "<h3>Numeros generados:</h3>";
            echo "<p>" . implode(", ", $numeros) . "</p>";
        }
    }
    ?>
</body>
</html>
