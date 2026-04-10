 <?php

if (!empty($_POST)) {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $edad = $_POST['edad'] ?? '';
    $profesion = $_POST['profesion'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $navegadores = $_POST['navegador'] ?? [];

    echo "<h3>Datos recibidos:</h3>";
    echo "Nombre: $nombre<br>";
    echo "Apellido: $apellido<br>";
    echo "Edad: $edad<br>";
    echo "Profesión: $profesion<br>";
    echo "Sexo: $sexo<br>";
    echo "Navegador(es): " . implode(", ", $navegadores) . "<br>";
}


else{

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Ejemplo 3</title>
</head>
<body>
  <form method="post" action="">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br><br>

    <label for="apellido">Apellido:</label>
    <input type="text" name="apellido" id="apellido">
    <br><br>

    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" min="1" max="120">
    <br><br>

    <label for="profesion">Profesión:</label>
    <select name="profesion" id="profesion">
      <option value="Ingeniero">Ingeniero</option>
      <option value="Arquitecto">Arquitecto</option>
      <option value="Granjero">Granjero</option>
      <option value="Profesor">Profesor</option>
      <option value="Electricista">Electricista</option>
    </select>
    <br><br>

    <label>Sexo:</label>
    <input type="radio" name="sexo" value="Masculino" id="masculino"> Masculino
    <input type="radio" name="sexo" value="Femenino" id="femenino"> Femenino
    <br><br>

    <label>Navegador usado:</label>
    <input type="checkbox" name="navegador[]" value="Internet Explorer" id="ie"> Internet Explorer
    <input type="checkbox" name="navegador[]" value="Firefox" id="firefox"> Firefox
    <br><br>

    <input type="submit" value="Enviar datos">
  </form>
</body>
</html>
<?php
}
?>


