<?php
session_start();
$hn = 'localhost';
$db = 'tragaperras';   // nombre de la BD
$un = 'jugador';       // usuario de la BD
$pw = '';              // contraseña
if ($connection->connect_error) die("Error de conexión");
$error = '';

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

// Array de imágenes disponibles (colócalas en una carpeta del proyecto)
$simbolos = ["cereza.png","limon.png","campana.png","estrella.png","diamante.png"];

// Generar tres resultados aleatorios usando rand()
$r1 = $simbolos[rand(0, count($simbolos)-1)];
$r2 = $simbolos[rand(0, count($simbolos)-1)];
$r3 = $simbolos[rand(0, count($simbolos)-1)];

// Mostrar resultado en pantalla
echo "<h1>Resultado:</h1>";
echo "<img src='$r1' width='80'> <img src='$r2' width='80'> <img src='$r3' width='80'>";

$login = $_SESSION['login'];
$puntosGanados = 0;   // variable para calcular puntos

// Comprobamos combinaciones con if/else clásico
if ($r1 == $r2 && $r2 == $r3) {
    // Caso: tres iguales
    if ($r1 == "diamante.png") {
        echo "<p>¡Jackpot! Tres diamantes, +5 puntos</p>";
        $puntosGanados = 5;
    } else {
        echo "<p>¡Enhorabuena, tres iguales! +1 punto</p>";
        $puntosGanados = 1;
    }
    // Guardamos partida como victoria
    $query = "INSERT INTO partidas (login, resultado, fecha) VALUES ('$login', 1, CURDATE())";
    $connection->query($query);

} elseif ($r1 == $r2 || $r1 == $r3 || $r2 == $r3) {
    // Caso: dos iguales
    echo "<p>¡Bien! Dos iguales, +2 puntos</p>";
    $puntosGanados = 2;

    $query = "INSERT INTO partidas (login, resultado, fecha) VALUES ('$login', 1, CURDATE())";
    $connection->query($query);

} else {
    // Caso: ninguna combinación
    echo "<p>Lo sentimos, no hay premio. −1 punto</p>";
    $puntosGanados = -1;

    $query = "INSERT INTO partidas (login, resultado, fecha) VALUES ('$login', 0, CURDATE())";
    $connection->query($query);
}

// Actualizar puntos del jugador en la tabla jugador
$update = "UPDATE jugador SET puntos = puntos + $puntosGanados WHERE login='$login'";
$connection->query($update);
?>
<a href="inicio.php">Volver a jugar</a>
<a href="estadistica.php">Ver estadísticas</a>