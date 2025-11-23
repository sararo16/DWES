<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$num = $_SESSION['num'];
$usuario = $_SESSION['nombre'];

echo "<h2>AGENDA</h2>";
echo "<p> Hola $usuario</p>";
echo "<p>Se han grabado los $num contactos de $usuario.</p>";

echo "<a href='index.php'>Volver a logearse</a>";
echo "<br>";
echo "<a href='inicio.php'> Introducir más contactos para $usuario</a>";
echo "<br>";
echo "<a href='totales.php'>Total de contactos guardados</a>";
?>