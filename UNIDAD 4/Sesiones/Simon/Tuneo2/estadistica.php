<?php

session_start();

$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';



$connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");

    $query = "SELECT u.nombre, COUNT(j.acierto) AS acierto FROM usuarios u LEFT JOIN jugadas j ON u.Codigo = j.codigousu GROUP BY u.Codigo";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");




if (isset($_POST['submit'])) {
    if (!empty($_POST['numero']) && !empty($_POST['numero-colores'])){
        $numero = $_POST['numero'];
        $numero_colores = $_POST['numero-colores'];
        $query2 = "SELECT u.Codigo, u.Nombre, COUNT(j.acierto) AS acierto, j.numcirculos, j.numcolores FROM usuarios u LEFT JOIN jugadas j ON u.Codigo = j.codigousu WHERE j.numcirculos = $numero AND j.numcolores = $numero_colores GROUP BY u.Codigo, j.numcirculos, j.numcolores";
        $result2 = $connection->query($query2);
        if (!$result2) die("Fatal Error");


echo <<<_END
            <table border="1">
                <tr>
                    <th>Codigo usuario</th>
                    <th>Nombre</th>
                    <th>Numero circulos</th>
                    <th>Numero colores</th>
                    <th>Numero aciertos</th>
                </tr>
_END;

        /**
         * for ($j = 0 ; $j < $rows ; ++$j) {
         *   $result2->data_seek($j);
         *   $row = $result2->fetch_assoc();

         *   echo "<tr>";
         *   echo "<td>" . htmlspecialchars($row['Codigo']) . "</td>";
         *   echo "<td>" . htmlspecialchars($row['Nombre']) . "</td>";
         *   echo "<td>" . htmlspecialchars($row['numcirculos']) . "</td>";
         *   echo "<td>" . htmlspecialchars($row['numcolores']) . "</td>";
         *   echo "<td>" . htmlspecialchars($row['acierto']) . "</td>";
         *   echo "</tr>";
         *   }
         */



        $rows = $result2->num_rows;
        for ($j = 0 ; $j < $rows ; ++$j) {
            $result2->data_seek($j);
            echo '<tr>';
            echo '<td>' .htmlspecialchars($result2->fetch_assoc()['Codigo']). '</td>';
            $result2->data_seek($j);
            echo '<td>' .htmlspecialchars($result2->fetch_assoc()['Nombre']). '</td>';
            $result2->data_seek($j);
            echo '<td>' .htmlspecialchars($result2->fetch_assoc()['numcirculos']). '</td>';
            $result2->data_seek($j);
            echo '<td>' .htmlspecialchars($result2->fetch_assoc()['numcolores']). '</td>';
            $result2->data_seek($j);
            echo '<td>' .htmlspecialchars($result2->fetch_assoc()['acierto']). '</td>';
            echo "</tr>";
            
         }
         $result2->close();
    }

}




 

  

echo <<<_END
    </table>
    </body>
</html>
_END;

echo "<br>";
echo "Nivel de dificultad: ";
echo <<<_END
<form action="estadistica.php" method="post">
        <label for="numero">Numero de circulos</label>
        <select name="numero">
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        <label for="numero-colores">numero de colores </label>
        <select name="numero-colores">
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select><br><br>
        <input type="submit" name="submit" value="Estadisticas">
        </form>

_END;
echo "<br>";
echo "<a href='dificultad.php'>Volver a jugar</a><br><br>";

$connection->close();

?>