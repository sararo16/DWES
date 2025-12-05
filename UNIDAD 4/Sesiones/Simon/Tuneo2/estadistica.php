<?php

session_start();

$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';



$connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");

    $query = "SELECT u.Codigo, u.Nombre, COUNT(j.acierto) AS acierto FROM usuarios u LEFT JOIN jugadas j ON u.Codigo = j.codigousu GROUP BY u.Codigo";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");

echo <<<_END
<html>
    <body>
        <h1>SIMÓN</h1>
_END;

        echo "<h2>$_SESSION[usuario], los resultados son:</h2>";

echo <<<_END
            <table border="1">
                <tr>
                    <th>Codigo usuario</th>
                    <th>Nombre</th>
                    <th>Numero aciertos</th>
                </tr>
_END;


$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) {
    echo '<tr>';
    $result->data_seek($j);
    echo '<td>' .htmlspecialchars($result->fetch_assoc()['Codigo']). '</td>';
    $result->data_seek($j);
    echo '<td>' .htmlspecialchars($result->fetch_assoc()['Nombre']). '</td>';
    $result->data_seek($j);
    echo '<td>' .htmlspecialchars($result->fetch_assoc()['acierto']). '</td>';
    echo "</tr>";
    
 }

 $result->close();

  

echo <<<_END
    </table>
    </body>
</html>
_END;

echo "<br>";
echo "<a href='inicio.php'>Volver a jugar</a><br><br>";

$connection->close();

?>