/*
18. Realiza el ejercicio anterior pero con la función array_push().
*/

<?php


$animales=array("Lagartija","araña","perro","gato","Raton");
$numeros=array("12","34","45", "52","12");
$arboles=array("Sauce", "Pino","Naranjo","Chopo", "Perro", "34");
print_r($animales); echo "<br>";
print_r($numeros); echo "<br>";
print_r($arboles); echo "<br>";
$combinados=array();
echo "<br>Array combinado: <br>";
foreach ($animales as $valor){
    array_push($combinados,$valor);
}
foreach ($numeros as $valor){
    array_push($combinados,$valor);
}
foreach ($arboles as $valor){
    array_push($combinados,$valor);
}
print_r($combinados);
?>