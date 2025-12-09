<?php
session_start();


$dni=$_SESSION['dni'];
$nombre=$_SESSION['nombre'];

$hn = 'localhost';
$db = 'bdoposicion';
$un = 'root';
$pw = '';
$connection = new mysqli($hn, $un, $pw, $db);

if ($connection->connect_error) die("Fatal Error");

$query="SELECT * FROM curso WHERE profesor='$dni'";
$result=$connection->query($query);
if (!$result) die ("Fatal Error");

$totalHoras='0';

echo <<<_END
<html>
    <head>
    <style>
        table  {width: 50%; margin: 20px }
        th, td { border: 1px  black; padding: 8px; text-align: center; }
        th { background-color: gray; }
        .cabecera { border: 1px  black; padding: 10px; width: 50%; margin: 10px ; background-color: #e6f7ff; }
    </style>
</head>
<body>
    <div class="cabecera">
        <strong>PROFESOR:</strong> $dni <strong>NOMBRE:</strong> $nombre
    </div>
    <table>
        <tr>
            <th>codigocurso</th>
            <th>nombrecurso</th>
            <th>maxalumnos</th>
            <th>fechaini</th>
            <th>fechafin</th>   
            <th>numhoras</th>
            <th>profesor</th>
        </tr>
_END;
$numrow=$result->num_rows;
for ($i=0; $i<$numrow; $i++) {
    $row=$result->fetch_assoc();
    echo "<tr>";
    echo "<td>" . $row['codigocurso'] . "</td>";
    echo "<td>" . $row['nombrecurso'] . "</td>";
    echo "<td>" . $row['maxalumnos'] . "</td>";
    echo "<td>" . $row['fechaini'] . "</td>";
    echo "<td>" . $row['fechafin'] . "</td>";
    echo "<td>" . $row['numhoras'] . "</td>";
    echo "<td>" . $row['profesor'] . "</td>";
    echo "</tr>";
}
echo "</table>";

$result->close();
$connection->close();

    



?>