
<?php

if (isset($_POST ['edad'])){
    $edad= $_POST['edad'];

   switch($edad){
    case 'Menos de 14 años':
        echo "Eres una personita";
        break;

    case 'Entre 15 y 20 años':
        echo "Todavia eres muy joven";
        break;

    case 'Entre 21 a 40 años':
        echo "Eres una persona joven";
        break;

    case 'Entre 41 y 60 años':
        echo "Eres una persona madura";
        break;

    case 'Mas de 60 años':
        echo "Ya eres una persona mayor";
        break;
    default:
        echo "Aún no me has dicho tu edad";
   }
}