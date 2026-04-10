<?php
if (!isset($_POST['calcular'])) {
    // Primera ejecución → pintar formulario con matriz 2x3
    echo "<form method='post' action='ejercicio1.php'>";
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 3; $j++) {
            echo "E.$i.$j <input type='text' name='valores[]'><br>";
        }
    }
    echo "<input type='submit' name='calcular' value='Calcular'>";
    echo "</form>";
} else {
    // Recarga → procesar valores
    $valores = $_POST['valores'];

    foreach ($valores as $v) {
        if (is_numeric($v) && $v >= 1 && $v <= 100) {
            echo "$v → ".decbin((int)$v)."<br>";
        } else {
            echo "Valor inválido ($v). Debe ser entre 1 y 100.<br>";
        }
    }
}