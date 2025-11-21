<?php

switch ($_POST['OPERACION']) {
    case 'suma':
        $resultado = $_POST['NUMERO1'] + $_POST['NUMERO2'];
        break;
    case 'resta':
        $resultado = $_POST['NUMERO1'] - $_POST['NUMERO2'];
        break;
    case 'multiplicacion':
        $resultado = $_POST['NUMERO1'] * $_POST['NUMERO2'];
        break;
    case 'division':
        $resultado = $_POST['NUMERO1'] / $_POST['NUMERO2'];
        break;
    default:
        $resultado = 0;
}

echo "El resultado de la operación es: " . $resultado;
?>
