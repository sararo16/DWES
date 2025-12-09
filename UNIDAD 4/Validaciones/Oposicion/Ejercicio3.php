<?php
session_start();
// Control de seguridad
if (!isset($_SESSION['dni'])) {
    header("Location: ejercicio1.php");
    exit();
}
$dni=$_SESSION['dni'];
$nombre=$_SESSION['nombre'];

$hn = 'localhost';
$db = 'bdoposicion';
$un = 'root';
$pw = '';
$connection = new mysqli($hn, $un, $pw, $db);

if ($connection->connect_error) die("Fatal Error");

$mensaje = "";
// Variables para mantener los valores (Sticky Form)
$val_codcurso = "";
$val_pruebaA = "";
$val_pruebaB = "";
$val_tipo = "";
$val_inscripcion = "";

// Lógica al pulsar GUARDAR
if (isset($_POST['guardar'])) {
    // Recogemos datos
    $codcurso = $_POST['codcurso'];
    $pruebaA = $_POST['pruebaA'];
    $pruebaB = $_POST['pruebaB'];
    $tipo = $_POST['tipo'];
    $inscripcion = $_POST['inscripcion'];

    // 1. Validar que no haya campos vacíos
    if (empty($codcurso) || empty($pruebaA) || empty($pruebaB) || empty($tipo) || empty($inscripcion)) {
        $mensaje = "Error: Todos los campos son obligatorios.";
        $val_codcurso = $codcurso; $val_pruebaA = $pruebaA; $val_pruebaB = $pruebaB; $val_tipo = $tipo; $val_inscripcion = $inscripcion;
    } else {
        
        // 2. Comprobar si el código de curso existe
        // IMPORTANTE: Uso `oposicion curso` según el PDF. Si tu tabla local se llama 'curso', cámbialo aquí.
        $queryCheck = "SELECT * FROM  curso WHERE codigocurso = '$codcurso'";
        $resultCheck = $connection->query($queryCheck);

        if ($resultCheck->num_rows == 0) {
            // No existe el curso
            $mensaje = "El código de curso introducido NO existe.";
            $val_codcurso = ""; // Vaciamos solo el curso
            $val_pruebaA = $pruebaA; $val_pruebaB = $pruebaB; $val_tipo = $tipo; $val_inscripcion = $inscripcion;
        } else {
            
            // 3. Grabar matrícula (Con comprobación de duplicados)
            
            // Paso A: Verificar si ya existe (SELECT)
            $queryDuplicado = "SELECT * FROM  matricula WHERE dnialumno = '$dni' AND codcurso = '$codcurso'";
            $resultDuplicado = $connection->query($queryDuplicado);

            if ($resultDuplicado->num_rows > 0) {
                // Paso B: Si devuelve filas, ya está matriculado. Error.
                $mensaje = "Error: El alumno ya está matriculado en este curso.";
                $val_codcurso = $codcurso; $val_pruebaA = $pruebaA; $val_pruebaB = $pruebaB; $val_tipo = $tipo; $val_inscripcion = $inscripcion;
            } else {
                // Paso C: Si NO hay filas, hacemos el INSERT real
                $queryInsert = "INSERT INTO matricula (dnialumno, codcurso, pruebaA, pruebaB, tipo, inscripcion) 
                                VALUES ('$dni', '$codcurso', '$pruebaA', '$pruebaB', '$tipo', '$inscripcion')";
                
                if ($connection->query($queryInsert) === TRUE) {
                    $mensaje = "La matrícula del alumno $dni en el curso $codcurso se ha realizado correctamente";
                    // Limpiamos campos tras éxito
                    $val_codcurso = ""; $val_pruebaA = ""; $val_pruebaB = ""; $val_tipo = ""; $val_inscripcion = "";
                } else {
                    $mensaje = "El proceso no se ha podido realizar: " . $connection->error;
                }
            }
        }
    }
}
?>

<html>
<head>
    <title>Ejercicio 3 - Matrícula</title>
    <style>
        .form-container { 
            border: 1px solid black; 
            width: 400px; 
            padding: 20px; 
            margin: 20px auto; 
        }
        .header { 
            background-color: #ffccbc; 
            padding: 10px; 
            margin-bottom: 20px; 
            font-weight: bold;
        }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="date"], input[type="number"] { width: 100%; padding: 5px; }
        input[type="submit"] { 
            margin-top: 20px; 
            background-color: #5c85d6; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            cursor: pointer;
            float: right;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <div class="header">
            ALUMNO &nbsp;&nbsp; <?php echo $dni; ?> &nbsp;&nbsp;&nbsp;&nbsp; NOMBRE &nbsp;&nbsp; <?php echo $nombre; ?>
        </div>

        <form action="ejercicio3.php" method="post">
            <label>DNI</label>
            <input type="text" name="dni_display" value="<?php echo $dni; ?>" readonly>

            <label>COD CURSO</label>
            <input type="text" name="codcurso" value="<?php echo $val_codcurso; ?>">

            <label>PRUEBA A</label>
            <input type="number" name="pruebaA" value="<?php echo $val_pruebaA; ?>">

            <label>PRUEBA B</label>
            <input type="number" name="pruebaB" value="<?php echo $val_pruebaB; ?>">

            <label>TIPO</label>
            <input type="text" name="tipo" value="<?php echo $val_tipo; ?>">

            <label>INSCRIPCIÓN</label>
            <input type="date" name="inscripcion" value="<?php echo $val_inscripcion; ?>">

            <input type="submit" name="guardar" value="GUARDAR">
            <div style="clear: both;"></div>
        </form>

        <?php if ($mensaje != ""): ?>
            <p style="color: blue; font-weight: bold; text-align: center; margin-top: 15px;">
                <?php echo $mensaje; ?>
            </p>
        <?php endif; ?>
    </div>

</body>
</html>
<?php $connection->close(); ?>