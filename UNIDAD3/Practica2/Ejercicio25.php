/*
25. Crea una matriz para guardar a los amigos clasificados por diferentes ciudades.
Los valores serán los siguientes:
Haz un recorrido del array multidimensional mostrando los valores de tal manera
que nos muestre en cada ciudad que amigos tiene.
*/

<?php

$amigos =array(
    'Madrid' => array('Nombre'=>'Pedro', 'edad'=>32, 'teléfono'=>'91-999.99.99'),
    'Barcelona' => array('Nombre'=>'Susana', 'edad'=>34, 'teléfono'=>'93-000.00.00'),
    'Toledo'=> array('Nombre'=>'Sonia', 'edad'=>34, 'teléfono'=>'925-09.09.09'),
);

foreach ($amigos as $ciudad => $info) {
    echo "Ciudad: <b>$ciudad</b><br>\n";
    foreach ($info as $clave => $valor) {
        echo "&nbsp;&nbsp;$clave: $valor<br>\n";
    }   
}
?>