<?php
session_start();
$hn = 'localhost';
$db = 'memoria';   // nombre de la BD
$un = 'jugador';   // usuario de la BD
$pw = '';          // contraseña

if ($connection->connect_error) die("Fatal Error");
$error = '';


if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['carta'])) {
    $c = $_POST['carta'];

    // Si la carta no estaba levantada, la añadimos
    if (!in_array($c, $_SESSION['levantadas'])) {
        $_SESSION['levantadas'][] = $c;
    }

    // Si ya hay dos cartas levantadas
    if (count($_SESSION['levantadas']) == 2) {
        $c1 = $_SESSION['levantadas'][0];
        $c2 = $_SESSION['levantadas'][1];

        if ($_SESSION['mazo'][$c1] == $_SESSION['mazo'][$c2]) {
            header("Location: acierto.php");
            exit();
        } else {
            header("Location: fallo.php");
            exit();
        }
    }
}
header("Location: inicio.php");
