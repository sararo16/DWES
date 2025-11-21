/*
24. Crea un array llamado deportes e introduce los siguientes valores: futbol,
baloncesto, natación, tenis. Haz el recorrido de la matriz con un for para mostrar
sus valores. A continuación realiza las siguientes operaciones
 Muestra el total de valores que contiene.
 Sitúa el puntero en el primer elemento del array y muestra el valor actual, es
decir, donde está situado el puntero actualmente.
 Avanza una posición y muestra el valor actual.
 Coloca el puntero en la última posición y muestra su valor.
 Retrocede una posición y muestra este valor.
*/

<?php
$deportes=array(
    "futbol",
    "baloncesto",
    "natación",
    "tenis"
);

for ($i=0;$i<count($deportes);$i++){
    echo "Deporte ".($i+1).": ".$deportes[$i]."<br>\n";
}

echo "<br>El array tiene". count ($deportes)." elementos.<br>\n";
echo "El primer elemento del array es: ".current($deportes)."<br>\n";
next($deportes);
echo "El segundo elemento del array es: ".current($deportes)."<br>\n";
end($deportes);
echo "El último elemento del array es: ".current($deportes)."<br>\n";   