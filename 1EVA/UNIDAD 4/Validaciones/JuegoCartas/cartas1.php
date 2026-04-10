<?php
session_start();
$_SESSION['decimalcorrecto'] = 0;
$binario=[rand(0,1),rand(0,1),rand(0,1),rand(0,1)];
$potencias=[8,4,2,1];

for($i=0;$i<4;$i++){
    if($binario[$i]==1){
        $_SESSION['decimalcorrecto']+=$potencias[$i];
    }
}

echo "El número en binario es: ";
foreach($binario as $bit){
    echo $bit;
}
echo "<br>";
for($i=0;$i<4;$i++){
    if($binario[$i]==1){
        switch($potencias[$i]){
            case 1:
                echo "<img src='imagenes/Uno.png' alt='1'>";
                break;
            case 2:
                echo "<img src='imagenes/dos.png' alt='2'>";
                break;
            case 4:
                echo "<img src='imagenes/cuatro.png' alt='4'>";
                break;
            case 8:
                echo "<img src='imagenes/ocho.png' alt='8'>";
                break;
            default:
                break;
        }
    }else{
        echo "<img src='imagenes/negro.png' alt='0'>";
    }
}
echo "<br><br>";
echo <<<_END
<form action="cartas2.php" method="post">
    <label for="numdecimal">Número decimal:</label>
    <input type="text" id="numdecimal" name="numdecimal" required>
    <input type="submit" name="submit" value="Enviar">
</form>
_END;
    ?>
