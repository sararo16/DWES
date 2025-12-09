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

echo "Bienvenido ".$_SESSION['login']."<br>";
echo "<form action='jugar.php' method='post'>";

for ($i=0; $i<count($_SESSION['mazo']); $i++) {
    // Usamos if/else 
    if (in_array($i, $_SESSION['levantadas'])) {
        $valor = $_SESSION['mazo'][$i];   // Mostrar carta real
    } else {
        $valor = "X";                     // Mostrar carta oculta
    }

    echo "<button type='submit' name='carta' value='$i' style='width:80px;height:80px;'>$valor</button>";

    // Salto de línea cada 4 cartas para formar filas
    if (($i+1)%4==0) echo "<br>";
}
echo "</form>";
?>
<a href="estadistica.php">Ver estadísticas</a>