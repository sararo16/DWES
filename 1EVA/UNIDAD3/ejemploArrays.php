<?php

$nombres= array(
 'Hola','Adios','pepe','juan','perro' ,'gato');
$numeros=array(1,9,3,4,5,8,7,6,2,10);

sort ($nombres);
sort ($numeros);


foreach ($nombres as $nombre){
    echo $nombre."<br>";
}
echo "<br>";

var_dump(count($numeros));
echo "<br>";
print_r(array_count_values($numeros));

echo "<br>";

foreach ($numeros as $numero){
    echo $numero."<br>";
}


 $temp = explode(' ', "This is a sentence with seven words");
 print_r($temp);

 echo "<br>";

$texto = "H,O,L,A";
$temp = explode(",", $texto);
print_r($temp);

echo "<br>";

var_dump(array_find($nombres, function (string $value) {
    return strlen($value) > 4;
    }));



?>