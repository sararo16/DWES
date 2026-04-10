/*
22. Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el
contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. A
continuación borrar el contenido de posición 5. Vuelve a mostrar el contenido y
por último elimina el array.

*/

<?php

$valores=array(
    5=>1,
    12=>2,
    13=>56,
    "x"=>42
);

print_r($valores);

echo "<br>El array tiene ".count($valores)." elementos.<br>";

unset($valores[5]);
print_r($valores);
unset($valores);
?>

