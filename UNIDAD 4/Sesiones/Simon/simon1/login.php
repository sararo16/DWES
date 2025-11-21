<?php  

$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';


$connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");

$error='';


 if (isset($_POST['submit'])) {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])){
     $usuario = $_POST['usuario'];
     $contrasenia = $_POST['contrasenia'];
     $query = "SELECT * FROM usuarios WHERE Nombre = '$usuario' AND Clave = '$contrasenia'";
     $result = $connection->query($query);
     if (!$result) die("Fatal Error");
     $rows = $result->num_rows;
     if ($rows == 1) {
         $_SESSION['usuario'] = $usuario;
         header("Location: inicio.php");
         exit();
     }else {
         $error = "Usuario o contraseña incorrectos";
     }
    $result->close();

    }
 }


     $connection->close();
echo <<<_END
<html>
    <body>
        <h1>SIMÓN</h1>
            <h2>Ingresa tus datos</h2>
            <form action="login.php" method="post">
                <label for="usuario">Usuario:</label><br>
                <input type="text" name="usuario"><br><>
                <label for="contrasenia">Contraseña:</label><br>
                <input type="password" name="contrasenia"><br><br>
                <input type="submit" name="submit" value="Enviar">
            </form>
            <p>$error</p>
    </body>
</html>
_END;

?>