/*
Rellena los siguientes tres arrays y júntalos en uno nuevo. Muéstralos por
pantalla. Utiliza la función array_merge()
*/

<?php


$animales=array("Lagartija","araña","perro","gato","Raton");
$numeros=array("12","34","45", "52","12");
$arboles=array("Sauce", "Pino","Naranjo","Chopo", "Perro", "34");
print_r($animales); echo "<br>";
print_r($numeros); echo "<br>";
print_r($arboles); echo "<br>";
$combinados=array_merge($animales,$numeros,$arboles);
echo "<br>Array combinado: <br>";
print_r($combinados);

?>