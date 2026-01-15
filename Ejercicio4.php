<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Barra de progreso</title>
    <!-- Esto son los estilos que marcan la tabal para que se vea mejor -->
    <style>
        .contenedor-barra {
            width: 100%;
            height: 30px;
            background-color: #e0e0e0;
            border-radius: 15px;
            overflow: hidden;
        }
        .barra {
            height: 100%;
            background-color: #28a745;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Barra de progreso de ventas</h2>
    <form method="POST">
        Objetivo de Ventas: <input type="number" name="objetivo" min="1" required><br><br>
        Ventas Actuales: <input type="number" name="actuales" min="0" required><br><br>
        <button type="submit">Calcular</button>
    </form>
    <?php
    // Parte php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $objetivo = (float)$_POST['objetivo'];
        $actuales = (float)$_POST['actuales'];
        if ($objetivo <= 0) {
            echo "<p style='color:red;'>La cantidad tiene que ser mas de 0</p>";
        } else {
            $porcentaje = ($actuales * 100) / $objetivo;
            // Esto limita la cantidad del progreso de asta un 0% asta un 100%
            $porcentaje = min(100, max(0, $porcentaje));
            $porcentaje = round($porcentaje);
            echo "<div class='contenedor-barra'>";
            echo "<div class='barra' style='width: {$porcentaje}%;'>";
            echo "{$porcentaje}%";
            echo "</div>";
            echo "</div>";
            echo "<p>" . number_format($actuales, 2) . " / " . number_format($objetivo, 2) . "</p>";
        }
    }
    ?>
</body>
</html>
