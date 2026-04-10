<?php
session_start();
echo "Buenos dias ". $_SESSION['nombre'] . " los jugadores son: " . $_POST['jugador1'] . ", " . $_POST['jugador2'] . ", " . $_POST['jugador3'];
?>










