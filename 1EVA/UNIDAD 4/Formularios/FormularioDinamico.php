<html>
    <body>

<?php
if (isset($_POST['num1'])) {
    // Mostrar resultados
    for ($i = 1; $i <= 10; $i++) {
        if (isset($_POST["num$i"])) {
            $numero = $_POST["num$i"];
            echo "El número $i es: $numero <br>";
        }
    }
} else {
    // Mostrar formulario
    echo <<< _END
    <form method="post" action="FormularioDinamico.php">
    _END;

    for ($i = 1; $i <= 10; $i++) {
        echo "<label for=\"num$i\">Número $i:</label>";
        echo "<input id=\"num$i\" name=\"num$i\">";
        echo "<br><br>";
    }

    echo <<< _END
    <input type="submit" id="button" value="Enviar">
    </form>
    _END;
}
?>

    </body>
</html>
