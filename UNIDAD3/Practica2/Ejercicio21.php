/*
Implementa un array asociativo con los siguientes valores y ordénalo de menor a
mayor. Muestra los valores en una tabla.
$numeros=array(3,2,8,123,5,1)

*/

<?php
echo "<html>\n<body>\n";
$numeros=array(3,2,8,123,5,1);
echo "Array original: <br>";
print_r($numeros);
sort($numeros);
echo "<br>Array ordenado de menor a mayor: <br>";
echo "<table border='1'cellpadding='5'>\n<tr><th>Número</th><th>Valor</th></tr>\n";
foreach ($numeros as $indice => $valor){
    echo "<tr><td>$indice</td><td>$valor</td></tr>\n";
}
echo "</table>\n</body>\n</html>";
?>