<?php
session_start(); 

$hn = 'localhost';
$db = 'bdoposicion'; 
$un = 'root';
$pw = '';
$connection = new mysqli($hn, $un, $pw, $db);

if ($connection->connect_error) die("Fatal Error");

$mensaje = ""; 

if (isset($_POST['submit'])) {
    if (!empty($_POST['dni'])) {
        $dni = $_POST['dni']; 

        $queryA = "SELECT * FROM alumno WHERE dniA = '$dni'";
        $resultA = $connection->query($queryA);
        
        if ($resultA->num_rows == 1) {
            
            $fila = $resultA->fetch_assoc();
            $_SESSION['dni'] = $dni;         
            $_SESSION['nombre'] = $fila['nombreA'];             
            header("Location: Ejercicio3.php"); 
            exit();
        } 
        else {
            $queryP = "SELECT * FROM profesor WHERE dniP = '$dni'";
            $resultP = $connection->query($queryP);
            
            if ($resultP->num_rows == 1) {
                $fila = $resultP->fetch_assoc();
                $_SESSION['dni'] = $dni;          
                $_SESSION['nombre'] = $fila['nombreP'];

                header("Location: Ejercicio2.php"); 
                exit();
            } 
            else {
               
                $mensaje = "El DNI no existe en la base de datos.";
            }
        }
    }
}

$connection->close();

echo <<<_END
<html>
    <head>
            <h1>DNI</h1>
            <form action="Ejercicio1.php" method="post">
                <input type="text" name="dni" required><br><br>
                <input type="submit" name="submit" value="ENTRAR">
            </form>
            <br>
            <div class="error">$mensaje</div>
        </div>
    </body>
</html>
_END;
?>