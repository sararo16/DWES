<?php

/*. 7. Generar una matriz de 3x4 y generar un vector que contenga los valores máximos
de cada fila y otro que contenga los promedios de los mismos. Imprimir ambos
vectores a razón de uno por renglón.*/ 

//Iniciar la matriz
$matriz =[];
for ($i=0; $i < 3; $i++) {
    for ($j=0; $j < 4; $j++) {
        $matriz[$i][$j] = rand(1, 99);
    }
}

//iniciar los valores maximos y los promedios
$maximos = [];  
$promedios = [];    


// Recorrer la matriz para obtener los valores máximos y los promedios
foreach ($matriz as $fila) {
    // Obtener el valor máximo de la fila
    $maximo = max($fila);
    // Calcular el promedio de la fila
    $promedio = array_sum($fila) / count($fila);
    
    // Guardar los resultados en los vectores
    $valores_maximos[] = $maximo;
    $promedios[] = $promedio;
}

// Imprimir los vectores
echo "Valores máximos de cada fila: ". "<br>";
foreach ($valores_maximos as $max) {
    echo $max . " ";
}
echo  "<br>";
echo "Promedios de cada fila: ". "<br>";
foreach ($promedios as $promedio) {
    echo $promedio . " ";
}
echo "<br><br>";
?>