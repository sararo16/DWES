<html>
    <body>

<?php
if (isset($_POST['num1'])) {
    // Mostrar resultados
    $cantidad = intval($_POST['cantidad']);
    for ($i = 1; $i <=$cantidad; $i++) {
        if (isset($_POST["num$i"])) {
            $numero = $_POST["num$i"];
            echo "El número $i es: $numero <br>";
        }
    }
    echo<<< _END
    <br> <a href="cajas.html">volver</a>
    _END;

} elseif (isset($_POST['cantidad'])) {
    // Mostrar formulario
    $cantidad = intval($_POST['cantidad']);
    
    echo <<< _END
    <form method="post" action="FormularioDinamico2.php">   
    _END;

    for ($i = 1; $i <= $cantidad; $i++) {
        echo "<label for=\"num$i\">Número $i:</label>";
        echo "<input id=\"num$i\" name=\"num$i\" required>";
        echo "<br><br>";
    }
    //se manda la cantidad para usarla en la segunda parte
    echo "<input type='hidden' name='cantidad' value='$cantidad'>";
    
    echo <<< _END
    <input type="submit" id="button" value="Enviar">
    </form>
    _END;
}
?>

    </body>
</html>
