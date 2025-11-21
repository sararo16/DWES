<?php
session_start();

if (isset($_SESSION['decimalcorrecto'])) {
     $decimalcorrecto = $_SESSION['decimalcorrecto']; 
    $numerodecimal = $_POST['numdecimal'];

    
    if ($numerodecimal == $decimalcorrecto) {
        echo "<p>¡Respuesta acertada! El número es $decimalcorrecto.</p>";
    } else {
        echo "<p>Has fallado, vuelve a jugar.</p>";
    }
    echo '<a href="cartas1.php">VOLVER A JUGAR</a>';
} else {
    
    echo "<p>Error: No se pudo recuperar el número correcto. Por favor, regresa a la página anterior.</p>";
}
?>
