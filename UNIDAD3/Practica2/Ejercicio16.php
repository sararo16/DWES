/* 
Crea un array llamado “lenguajes_cliente” y otro “lenguajes_servidor”, crea tu
mismo los valores, poniendo índices alfanuméricos a cada valor con tres
elementos cada uno. Junta ambos arrays en uno solo llamado “lenguajes” y
muéstralo por pantalla en una tabla.
*/

<?php
$lenguajes_servidor=array(
    'P'=>'PHP',
    'A'=>'ASP',
    'J'=>'JSP'
);
$lenguajes_cliente=array(
    'H'=>'HTML',
    'C'=>'CSS',
    'J'=>'JavaScript'
);
$lenguajes=array_merge($lenguajes_servidor,$lenguajes_cliente);
echo "<html>\n<body>\n";
echo "<table border='1' cellpadding='5'\n<tr><th>Clave</th><th>Lenguaje</th></tr>\n";
foreach ($lenguajes as $clave => $valor) {
    echo "<tr><td>$clave</td><td>$valor</td></tr>\n";
}
echo "</table>\n</body>\n</html>";
?>