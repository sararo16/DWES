<?php
session_start();

$dni=$_SESSION['dni'];
$nombre=$_SESSION['nombre'];

$hn = 'localhost';
$db = 'bdoposicion';
$un = 'root';
$pw = '';
$connection = new mysqli($hn, $un, $pw, $db);

if ($connection->connect_error) die("Fatal Error");

$query="SELECT * FROM alumno WHERE dniA='$dni'";
$result=$connection->query($query);
$row=$result->fetch_assoc();


echo <<<_END
<html>
    <body>
        <strong>ALUMNO:</strong> $nombre 
        <strong>DNI:</strong> $dni
        <br>



            
_END;

?>