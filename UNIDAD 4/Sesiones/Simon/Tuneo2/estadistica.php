<?php
session_start();

$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';

$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Fatal Error");

// Leer filtros del formulario (POST) o sin filtro
$numero = isset($_POST['numero']) ? intval($_POST['numero']) : null;
$numero_colores = isset($_POST['numero-colores']) ? intval($_POST['numero-colores']) : null;

// Construir condición de filtro opcional
$condiciones = [];
if ($numero !== null && $numero > 0)        $condiciones[] = "j.numcirculos = $numero";
if ($numero_colores !== null && $numero_colores > 0) $condiciones[] = "j.numcolor = $numero_colores";
$where = count($condiciones) ? "AND " . implode(" AND ", $condiciones) : "";

// Consulta única: usuario + dificultad + aciertos
$query = "SELECT u.Codigo, u.Nombre, j.numcirculos, j.numcolor, SUM(j.acierto) AS aciertos
          FROM usuarios u
          JOIN jugadas j ON u.Codigo = j.codigousu AND j.acierto = 1 $where
          GROUP BY u.Codigo, u.Nombre, j.numcirculos, j.numcolor
          ORDER BY u.Codigo, j.numcirculos, j.numcolor";
$result = $connection->query($query);
if (!$result) die("Error en la consulta");

echo "<html><body><h1>SIMÓN</h1>";
echo "<h2>" . htmlspecialchars($_SESSION['usuario'] ?? 'Usuario') . ", los resultados son:</h2>";

// Formulario de filtro
echo "<form method='post' style='margin-bottom:12px'>
        <label for='numero'>Número de círculos</label>
        <select name='numero' id='numero'>
            <option value=''>Todos</option>";
for ($i=4; $i<=8; $i++) {
    $sel = ($numero === $i) ? "selected" : "";
    echo "<option value='$i' $sel>$i</option>";
}
echo "  </select>
        <label for='numero-colores' style='margin-left:12px'>Número de colores</label>
        <select name='numero-colores' id='numero-colores'>
            <option value=''>Todos</option>";
for ($i=4; $i<=8; $i++) {
    $sel = ($numero_colores === $i) ? "selected" : "";
    echo "<option value='$i' $sel>$i</option>";
}
echo "  </select>
        <button type='submit' name='submit' style='margin-left:12px'>Filtrar</button>
      </form>";

// Tabla única
echo "<table border='1' cellpadding='6'>
        <tr>
            <th>Código usuario</th>
            <th>Nombre</th>
            <th>Número círculos</th>
            <th>Número colores</th>
            <th>Número aciertos</th>
        </tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . htmlspecialchars($row['Codigo']) . "</td>
            <td>" . htmlspecialchars($row['Nombre']) . "</td>
            <td>" . htmlspecialchars($row['numcirculos']) . "</td>
            <td>" . htmlspecialchars($row['numcolor']) . "</td>
            <td>" . htmlspecialchars($row['aciertos']) . "</td>
          </tr>";
}
echo "</table>";

echo "<br><a href='dificultad.php'>Volver a jugar</a>";
echo "</body></html>";

$result->close();
$connection->close();
?>

