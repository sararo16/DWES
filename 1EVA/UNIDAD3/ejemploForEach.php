<?php
/* $personas = array(
   $persona1=array ( 'Nombre'=>"Yolanda",
   'apellido 1'=> "Iglesias",
   'apellido 2'=>"Perez"),
    $persona2=array('Nombre: '=>"Sara", 'Apellido 1 '=> "Rodriguez",'Apellido 2: '=>"Ortega")
 );


 foreach($personas as $indice){
    foreach($indice as $nombre=>$valor){
    echo "$nombre:.$valor<br>";
    }
 }
*/

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