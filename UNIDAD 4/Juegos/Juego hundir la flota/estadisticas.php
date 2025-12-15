<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'dbflota');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking Flota</title>
</head>
<body>
    <h1>Mejores Comandantes</h1>
    <table border="1" cellpadding="10">
        <tr style="background-color:#eee;">
            <th>Posición</th>
            <th>Jugador</th>
            <th>Puntos (Max 50)</th>
            <th>Fecha</th>
        </tr>

        <?php
        $sql = "SELECT u.nombre, p.puntos, p.fecha 
                FROM partidas p
                INNER JOIN usuarios u ON p.id_usuario = u.id
                ORDER BY p.puntos DESC
                LIMIT 10";
        
        $res = $conn->query($sql);
        $pos = 1;

        if ($res) {
            while ($fila = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $pos++ . "</td>";
                echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                echo "<td>" . $fila['puntos'] . "</td>";
                echo "<td>" . $fila['fecha'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <br>
    <a href="juego.php">Volver al Tablero</a>
</body>
</html>