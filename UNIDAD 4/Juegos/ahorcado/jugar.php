<?php
session_start();
// Datos de conexión a la base de datos
$hn = 'localhost';   // servidor
$db = 'ahorcado';    // nombre de la base de datos (ajústalo al examen)
$un = 'jugador';     // usuario de la BD
$pw = '';            // contraseña del usuario

// Si falla la conexión, se muestra error y se corta el programa
if ($connection->connect_error) die("Fatal Error");

$error = ''; //variable para mostrar mensahes de error

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}
//si se pulsa probar
if (isset($_POST['submit'])) {
    $letra = strtoupper($_POST['letra']);  // Convertir letra a mayúscula
    $palabra = $_SESSION['palabra']; // Palabra a adivinar
    $progreso = $_SESSION['progreso']; // Estado actual (guiones y letras)
    $acierto = false; // Bandera para saber si acertó

    // Recorrer la palabra letra a letra
    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] == $letra) {
            $progreso[$i] = $letra; // Sustituir guion por la letra acertada
            $acierto = true;
        }
    }

    $_SESSION['progreso'] = $progreso;  // Actualizar progreso en sesión
    if (!$acierto) $_SESSION['fallos']++; // Si no acertó, sumar fallo

    // comprobar fin de partida
    if ($_SESSION['progreso'] == $palabra) {
        header("Location: acierto.php");
        exit();
    } elseif ($_SESSION['fallos'] >= 6) { //max seis fallos
        header("Location: fallo.php");
        exit();
    }
}
header("Location: inicio.php");
