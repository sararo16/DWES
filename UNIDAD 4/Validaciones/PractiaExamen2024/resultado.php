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

//sumar puntos
$puntoDia =$connection->query ("UPDATE jugador j INNER JOIN respuestas r ON j.login INNER JOIN solucion s ON r.fecha = s.fecha 
SET j.puntos=j.puntos+1
WHERE r.respuesta='$hoy'");

//resultados
$aciertos= $connection->query ("SELECT login, hora FROM respuestas r
INNER JOIN solucion s ON r.fecha=s.fecha
WHERE r.respuesta=s.solucion AND r.fecha='$hoy'");

$fallos= $connection->query ("SELECT login, hora FROM respuestas r
INNER JOIN solucion s ON r.fecha=s.fecha
WHERE r.respuesta!=s.solucion AND r.fecha='$hoy'");





echo <<<_END
<html>
    <body>
        <h1>Fecha: $hoy</h1>
        <h2>Jugadores acertantes: $aciertos->num_rows</h2>
        <table>
            <tr>
                <th>Login</th>
                <th>Hora</th>
            </tr>
            $aciertos->data_seek(0);
            while ($aciertos->fetch_assoc()) {
                echo "<tr><td>".$aciertos->login."</td><td>".$aciertos->hora."</td></tr>";
            }   
        </table>
        <h2>Jugadores que han fallado: $fallos->num_rows</h2>
        <table>
            <tr>
                <th>Login</th>
                <th>Hora</th>
            </tr>
            $fallos->data_seek(0);
            while ($fallos->fetch_assoc()) {
                echo "<tr><td>".$fallos->login."</td><td>".$fallos->hora."</td></tr>";
            }
</body>
</html>
_END;

?>