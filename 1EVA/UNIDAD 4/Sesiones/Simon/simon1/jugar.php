<?php
session_start();
require_once "pintar-circulos.php";

function color() {
    $nColor = rand(0,3);

 switch ($nColor) {
    case 0:
        $color = "red";
    break;
    case 1:
        $color = "yellow";
    break;
    case 2:
        $color = "blue";
    break;
    case 3:
        $color = "green";
    break;

    
 }
 return $color;
}
?>