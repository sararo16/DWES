<?php

/*5. Generar de forma aleatoria una matriz de 3x5 con valores numéricos.
a. Imprimir todos los elementos en forma sucesiva tomándolos por fila.
b. Igual al anterior pero por columna.*/

$num = array();
// a. Imprimir por fila
foreach ($num as $fila) {
    foreach ($fila as $valor) {
        echo $valor . " ";
    }
    echo "<br>";
}

foreach ($num as $fila) {
    echo $num[$i][$j];
    echo "<br>";
}

?>