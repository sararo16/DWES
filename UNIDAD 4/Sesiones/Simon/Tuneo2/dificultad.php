<?php

session_start();
$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';


$connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");


if (isset($_POST['submit'])) {
    if (!empty($_POST['numero']) && !empty($_POST['numero-colores'])){
    $numero = $_POST['numero'];
    $numero_colores = $_POST['numero-colores'];
    $codigousu = $_SESSION['codigousu'];

    $_SESSION['numero'] = $numero;
    $_SESSION['numero-colores'] = $numero_colores;


    $query = "INSERT INTO jugadas (codigousu, numcirculos, numcolores) VALUES ('$codigousu','$numero', '$numero_colores')";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
          header("Location: inicio.php");
        exit();
    }
}

$connection->close();