<?php

session_start();

unset($_SESSION['colores-escogidos']); //Para eliminar una variable de sesión previamente almacenada
unset($_SESSION['colores-correctos']); 


$todos_colores = array('red','blue','yellow','green','purple','orange','pink','brown');

//seleccionamos solo los colores permitidos por el jugador
$colores_disponibles=array_slice($todos_colores,0,$_SESSION['numero-colores']);

$_SESSION['colores-correctos'] = [];
for ($i = 0; $i < $_SESSION['numero']; $i++) {
    $_SESSION['colores-correctos'][$i] = $colores_disponibles[rand(0,count ($colores_disponibles)-1)];
}


echo <<<_END
<html>
    <body>
        <h1>SIMÓN</h1>
_END;

echo "<h2>Bienvenido/a $_SESSION[usuario], memoriza la combinación </h2>";

require 'pintar-circulos.php';
pintar_circulos($_SESSION['colores-correctos']);


echo <<<_END
    <form action="jugar.php" method="post">
        <input type="submit" name="submit" value="Vamos a jugar">
    </form>
    </body>
</html>
_END;
?>