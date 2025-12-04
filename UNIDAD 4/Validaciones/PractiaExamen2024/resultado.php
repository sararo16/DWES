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
$hoy=date ("Y-m-d");

$consultaSolucion=$connection-> query ("SELECT solucion FROM solucion WHERE fecha='$hoy'");
if ($consultaSolucion->num_rows==0){
    echo "<p>No hay solución registrada para hoy ($hoy). </p>";
    exit ();
}
$solucion=trim($consultaSolucion->fetch_assoc()['solucion']);





echo <<<_END
<html>
    <body>
        <h1>Fecha: $hoy</h1>

</body>
</html>
_END;

?>