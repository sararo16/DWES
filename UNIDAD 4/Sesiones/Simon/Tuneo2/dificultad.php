<?php

session_start();
$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';


$connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");


if (isset($_POST['submit'])) {
    if (!empty($_POST['numero']) && !empty($_POST['numero-colores'])){
    $numero = $_POST['numero'];
    $numero_colores = $_POST['numero-colores'];
    $codigousu = $_SESSION['codigousu'];

    $_SESSION['numero'] = $numero;
    $_SESSION['numero-colores'] = $numero_colores;


    $query = "INSERT INTO jugadas (codigousu, numcirculos, numcolores) VALUES ('$codigousu','$numero', '$numero_colores')";
        $result = $connection->query($query);
        if (!$result) die("Fatal Error");
          header("Location: inicio.php");
        exit();
    }
}

$connection->close();

echo <<<_END
<html>
    <body>
        <h2>Dificultad Simon</h2>
        <form action="inicio.php" method="post">
            <p>Numero de circulos con los que jugar</p>
            <select name="numero">
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select><br><br>
            
        <p>Numero de colores con los que jugar</p>
        <select name="numero-colores">
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select><br><br>
        <input type="submit" value="Jugar">
        </form>
    </body>
</html>

_END;


?>