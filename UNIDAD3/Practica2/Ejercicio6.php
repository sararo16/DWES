<?php

/*6. Generar de forma aleatoria una matriz de 4*5 con valores numéricos, determinar
fila y columna del elemento mayor*/ 
$matriz = [];
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz[$i][$j] = rand(1, 99);
    }
}

$max=0;
$fila=0;
$columna=0;

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        if ($matriz[$i][$j] > $max) {
            $max = $matriz[$i][$j];
            $fila = $i;
            $columna = $j;
        }
    }
}

echo "Mayor: $max en fila $fila, columna $columna";
echo "<br>"; 
   ?>