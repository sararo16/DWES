<?php
session_start();

// Inicializar carrera si no existe todavía
if (!isset($_SESSION['tortugas'])) {
    // Vector con 4 tortugas, todas en posición 0
    $_SESSION['tortugas'] = [0,0,0,0];
}

echo "<h1>Carrera de Tortugas</h1>";

// Mostrar estado actual de la carrera
foreach ($_SESSION['tortugas'] as $i => $pos) {
    // Cada tortuga se representa con bloques █ y puntos .
    echo "Tortuga ".($i+1).": ".str_repeat("█",$pos).str_repeat(".",20-$pos)."<br>";
}

// Botón para avanzar la carrera
echo '<form method="post" action="jugar.php">
        <input type="submit" name="avanzar" value="Avanzar">
      </form>';
?>
