/*
22. Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el
contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. A
continuación borrar el contenido de posición 5. Vuelve a mostrar el contenido y
por último elimina el array.

*/
<?php

$gente = array (
 array(
 'Familia' => 'Los Simpson',
 'Padre' => 'Homer',
 'Madre' => 'Marge',
 'Hijos' => array('Bart', 'Lisa' , 'Maggie')
 ),
 array(
 'Familia' => 'Los Griffin',
 'Padre' => 'Peter',
 'Madre' => 'Lois',
 'Hijos' => array('Chris', 'Meg' , 'Stewie')
 ));

echo "<ul>";
foreach ($gente as $familia) {
    echo "<li>";
    echo "<ul>";
    foreach ($familia as $clave => $valor) {
        if (is_array($valor)) {
            echo "<li>$clave<ul>";
            foreach ($valor as $hijo) {
                echo "<li>$hijo</li>";
            }
            echo "</ul></li>";
        } else {
            echo "<li>$clave: $valor</li>";
        }
    }
    echo "</ul>";
    echo "</li>";
}
echo "</ul>";

?> 