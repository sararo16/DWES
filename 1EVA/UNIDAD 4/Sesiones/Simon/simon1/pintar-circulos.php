<?php

function pintar_circulos($col1, $col2, $col3, $col4,) {
    echo <<<_END
        <div class="circulo" style="background-color: $col1;"></div>
        <div class="circulo" style="background-color: $col2;"></div>
        <div class="circulo" style="background-color: $col3;"></div>
        <div class="circulo" style="background-color: $col4;"></div>    
_END;

//creamos un array con los colores para usarlos luego
    $array=[$col1, $col2, $col3, $col4];
    return $array;
}

