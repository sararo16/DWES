<?php

session_start();

if (!isset($_POST['incrementar'])) {
    $_SESSION['imagenes'] = [];
}

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}



$array=[1,2,3,4,5];
$imagen='';

//inicializar el array
if (!isset($_SESSION['imagenes'])){
    $_SESSION['imagenes']=[];
}
if (isset ($_POST['incrementar'])){
    $incrementar=$_POST['incrementar'];
        $rand=$array[array_rand($array)];
            switch ($rand){
                case 1:
                    $imagen='OIP0.jfif';
                    break;
                case 2:
                    $imagen='OIP1.jfif';
                    break;
                case 3:
                    $imagen='OIP2.jfif';
                    break;
                case 4:
                    $imagen='OIP3.jfif';
                    break;
                case 5:
                    $imagen='OIP4.jfif';
                    break;
            }
        //añadimos la imagen al array de sesion
    $_SESSION['imagenes'][]=$imagen;
        //si hay 5 imagenes se redirige 
    if (count($_SESSION['imagenes'])>=5){
        header("Location:grabar.php");
        exit();
        }
}

?>


<html>
    <body>
        <h2>AGENDA</h2>
         <p>Hola  <?php echo $_SESSION['nombre']; ?>, ¿cuántos contactos deseas grabar?</p>
        <p>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más.</p>
        <p>Cuando el número sea el deseado, pulsa GRABAR.</p>

        <?php
        if (isset($_SESSION['imagenes'])){
            foreach ($_SESSION['imagenes'] as $img){
                echo "<img src='$img' alt='Imagen' width='100' height='100'>";
            }  
        }
        ?>
        <form action="inicio.php" method="post">

            <input type="submit" name="incrementar" value="INCREMENTAR">
            <input type="submit" formaction="agenda.php" value="GRABAR">
        </form>
    </body>
</html>


