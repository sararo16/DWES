<?php
session_start();
require 'pintar_circulos.php';

$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';

$numero = $_SESSION['numero'];
$numero_colores = $_SESSION['numero-colores'];

$connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");
 $usuario = $_SESSION['usuario'];
    $query = "SELECT Codigo FROM usuarios WHERE Nombre = '$usuario'";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    $row=$result->fetch_assoc();
    $codigousu = $row['Codigo'];

   $query2 = "INSERT INTO jugadas (codigousu, acierto, numcirculos, numcolor)
           VALUES ($codigousu, 1, $numero, $numero_colores)";
    $connection->query($query2);    

$result->close();
$connection->close();


$colores_correctos = $_SESSION['colores-correctos'];

echo "<h2>¡Enhorabuena, has acertado la combinación!</h2>";

pintar_circulos($colores_correctos);

echo '<br><a href="dificultad.php">Volver a jugar</a>';
echo '<br><a href="estadistica.php">Ver estadisticas</a>';
?> 