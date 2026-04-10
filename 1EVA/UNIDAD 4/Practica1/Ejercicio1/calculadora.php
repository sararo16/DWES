<?php

if (isset ($_POST['num1']) && isset ($_POST['num2'])&& $_POST['num1']!="" && $_POST['num2']!=""){
   
        $num1= $_POST['num1'];
        $num2= $_POST['num2'];
        echo "la suma de $num1 + $num2 es: " . ($num1+$num2);

}else{
    echo "No se han recibido los datos";
}
?>
