/*
Repite el ejercicio anterior pero ahora si se han de crear índices asociativos,
ejemplo:
El índice del array que contiene como valor Madrid es MD. 
*/

<?php
$ciudades=array(
    "MD"=>"Madrid",
    "BCN"=>"Barcelona",
    "LDN"=>"Londres",
    "NY"=>"New York",
    "LA"=>"Los Ángeles",
    "CH"=>"Chicago"
);
print_r($ciudades);
echo "<br>";
foreach ($ciudades as $clave => $valor) {
    echo "El índice del array que contiene como valor $valor es $clave.<br>";
}