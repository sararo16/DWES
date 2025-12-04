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



echo <<<_END
<html>
    <body>
        <h1>Fecha: <time datetime="2025-12-04">2025-12-04</time></h1>

</body>
</html>
_END;

?>