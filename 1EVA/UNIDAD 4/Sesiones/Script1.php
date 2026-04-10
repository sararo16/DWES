<?php
session_start();


echo <<<_END

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Formulario de sesiones</title>
</head>
<body>
  <form method="post" action="Script2.php">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br><br>

    <input type="submit" value="Jugar">
  </form>
</body>
</html>
_END;



  ?>