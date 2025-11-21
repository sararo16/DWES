<?php


/*4. Genera una matriz de 4*4 de forma aleatoria con números enteros desordenados
mostrar en un renglón los elementos almacenados en la diagonal principal y en el
siguiente los de la diagonal secundaria.
*/

$matriz = [];
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $matriz[$i][$j] = rand(1, 99);
    }
}

// Mostrar la matriz completa
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        echo str_pad($matriz[$i][$j], 3, " ", STR_PAD_LEFT) . " ";
    }
    echo "<br>";
}

// Mostrar la diagonal principal
for ($i = 0; $i < 4; $i++) {
    echo $matriz[$i][$i] . " ";
}

// Mostrar la diagonal secundaria
for ($i = 0; $i < 4; $i++) {
    echo $matriz[$i][3 - $i] . " ";
}
echo "<br><br>";
?>