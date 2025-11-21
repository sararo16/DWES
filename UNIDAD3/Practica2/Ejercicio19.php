/*
18. Realiza el ejercicio anterior pero con la funicón array_push().

*/

<?php


$animales=array("Lagartija","araña","perro","gato","Raton");
$numeros=array("12","34","45", "52","12");
$arboles=array("Sauce", "Pino","Naranjo","Chopo", "Perro", "34");
print_r($animales); echo "<br>";
print_r($numeros); echo "<br>";
print_r($arboles); echo "<br>";
$combinados=array();
foreach ($animales as $valor){
    array_push($combinados,$valor);
}
foreach ($numeros as $valor){
    array_push($combinados,$valor);
}
foreach ($arboles as $valor){
    array_push($combinados,$valor);
}
echo "<br>Array combinado: <br>";
$todos_reverso=array_reverse($combinados);
print_r($todos_reverso);
?>