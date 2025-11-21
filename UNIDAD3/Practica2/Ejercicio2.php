<?php
/*2. Crea el código que dé respuesta al siguiente planteamiento:
Queremos almacenar en una matriz el número de alumnos con el que cuenta una
academia, ordenados en función del nivel y del idioma que se estudia. Tendremos
3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4
columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3
= Ruso). Mostrar por pantalla los alumnos que existen en cada nivel e idioma.*/

?>

<?php
$alumnos=array(
    array(20,15,10,5), //Nivel básico
    array(25,20,15,10), //Nivel medio
    array(30,25,20,15)  //Nivel de perfeccionamiento
);
$niveles=array("Básico","Medio","Perfeccionamiento");
$idiomas=array("Inglés","Francés","Alemán","Ruso");
echo "<html>\n<body>\n";
for ($i=0;$i<count($alumnos);$i++){
    echo "<h3>Nivel ".$niveles[$i]."</h3>\n";
    echo "<ul>\n";
    for ($j=0;$j<count($alumnos[$i]);$j++){
        echo "<li>Idioma ".$idiomas[$j].": ".$alumnos[$i][$j]." alumnos</li>\n";
    }
    echo "</ul>\n";
}   
echo "</body>\n</html>\n";
?>