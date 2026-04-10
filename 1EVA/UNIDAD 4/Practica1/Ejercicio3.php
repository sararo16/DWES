<html>
    <head>
        <title>Ejercicio 3</title>
        <meta charset="UTF-8">
    </head>
    <body>
<h3>Introduce dos números y seleccione una operacion</h3>
<form method="post" action="">
    <label for ="num1">Número 1:</label>
    <input id="num1" name="num1" type="number">
    <br><br>

    <label for ="num2">Número 2:</label>
    <input id="num2" name="num2" type="number">
    <br><br>

    
   <button type="submit" name="operacion" value="suma">Suma</button>
    <button type="submit" name="operacion" value="resta">Resta</button>
    <button type="submit" name="operacion" value="multiplicacion">Multiplicación</button>
    <button type="submit" name="operacion" value="division">División</button>
</form>

    </body>
</html>
    <?php
    if (isset ($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operacion'])) {
        $num1=$_POST['num1'];
        $num2=$_POST['num2'];
        $operacion=$_POST['operacion'];
        
        switch ($operacion){
            case 'suma':
                $resultado=$num1+$num2;
            echo "<h4>El resultado de la suma es: $resultado</h4>";
            break;
        
            case 'resta':
                $resultado=$num1-$num2;
            echo "<h4>El resultado de la resta es: $resultado</h4>";
            break;
            case 'multiplicacion':
                $resultado=$num1*$num2;
            echo "<h4>El resultado de la multiplicación es: $resultado</h4>";
            break;
            case 'division':
                if ($num2 != 0){
                    $resultado=$num1/$num2;
                    echo "<h4>El resultado de la división es: $resultado</h4>";
                } else {
                    echo "<h4>No se puede dividir entre cero</h4>";
                }
            break;
            default:
                echo "<h4>Operación no válida</h4>";
        }
    }else {
        echo "<h4>Por favor, introduce ambos números y selecciona una operación.</h4>";
    }
    ?>  
