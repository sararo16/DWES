<?php
session_start();

if (isset($_POST['avanzar'])) {
    // Avanzar cada tortuga aleatoriamente entre 1 y 3 pasos
    foreach ($_SESSION['tortugas'] as $i => $pos) {
        $_SESSION['tortugas'][$i] += rand(1,3);

        // Comprobar si alguna llegó a la meta (posición 20)
        if ($_SESSION['tortugas'][$i] >= 20) {
            echo "<h2>¡Ganó la tortuga ".($i+1)."!</h2>";
            // Reiniciar carrera para volver a jugar
            session_destroy();
            echo '<a href="inicio.php">Nueva carrera</a>';
            exit();
        }
    }
}

// Volver a inicio.php para mostrar el estado actualizado
header("Location: inicio.php");
?>
