<?php
session_start();
$hn = 'localhost';
$db = 'jerogrifico';
$un = 'jugador';       
$pw = '';   
$connection = new mysqli($hn, $un, $pw, $db);


if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}
if (isset($_SESSION['login'])) {
    $login=$_SESSION['login'];

    $query="SELECT nombre FROM jugador WHERE login='$login'";
    $result=$connection->query($query);
    $row=$result->fetch_assoc();
    $nombre=$row['nombre'];
}else{
    $nombre=$login;
}

if (isset($_POST['solucion'])) {
    $solucion = $_POST['solucion'];
    $query = "INSERT INTO solucion (solucion, login) VALUES ('$solucion', '$login')";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
}

$connection->close();

echo <<<_END
<html>
    <body>
        <h3>Bienvenido $nombre. !</h3>
    <img src="imagen/20240216.jpg" alt="Jerogrifico del dia" width="500" height="500">
    <form method="post" action="inicio.php">
        <label>Solución al jerogrífico:</label>
        <input type="text" name="solucion" required>
        <input type="submit"  value="Enviar">
    </form>

    <a href="puntos.php">Ver puntos por jugador</a>
    <a href="resultado.php">Resultados del día</a>
    </body>
</html>
_END;
?>