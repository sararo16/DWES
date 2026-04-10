<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];

echo <<<_END
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Formulario de sesiones</title>
</head>
<body>
  <form method="post" action="Script3.php">
    <label for="Jugador">Jugador 1:</label>
    <input type="text" name="jugador1" id="jugador1">
    <br><br>

    <label for="Jugador">Jugador 2:</label>
    <input type="text" name="jugador2" id="jugador2">
    <br><br>

    <label for="Jugador">Jugador 3:</label>
    <input type="text" name="jugador3" id="jugador3">
    <br><br>
    
    <input type="submit" value="Ver">
  </form>
  <br><br>
  </body>
  </html>
_END;
  ?>