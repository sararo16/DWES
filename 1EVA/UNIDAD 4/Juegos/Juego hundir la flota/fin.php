<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'dbflota');

$mensaje_bd = "";

if (isset($_SESSION['puntos_finales']) && isset($_SESSION['id_usuario'])) {
    
    $puntos = $_SESSION['puntos_finales'];
    $id_user = $_SESSION['id_usuario'];

    $stmt = $conn->prepare("INSERT INTO partidas (id_usuario, puntos, fecha) VALUES (?, ?, NOW())");
    $stmt->bind_param("ii", $id_user, $puntos);
    
    if ($stmt->execute()) {
        $mensaje_bd = "¡Puntuación guardada correctamente!";
    } else {
        $mensaje_bd = "Error al guardar.";
    }

    // Limpieza
    unset($_SESSION['puntos_finales']);
    unset($_SESSION['flota_visible']);
    unset($_SESSION['flota_real']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fin del Juego</title>
</head>
<body style="text-align:center;">
    <h1>¡Misión Cumplida!</h1>
    <h2><?php echo $mensaje_bd; ?></h2>
    
    <a href="juego.php"><button>Jugar otra vez</button></a>
    <a href="estadisticas.php"><button>Ver Ranking</button></a>
    <a href="index.php"><button>Cerrar Sesión</button></a>
</body>
</html>