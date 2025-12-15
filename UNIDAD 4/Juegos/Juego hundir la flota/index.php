<?php
session_start();
// CONEXIÓN A LA NUEVA BD
$conn = new mysqli('localhost', 'root', '', 'dbflota');

if (isset($_POST['login'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $res = $conn->query($sql);

    if ($res && $res->num_rows > 0) {
        $fila = $res->fetch_assoc();
        if ($clave == $fila['clave']) {
            $_SESSION['id_usuario'] = $fila['id'];
            $_SESSION['usuario'] = $fila['nombre'];
            header("Location: juego.php");
            exit();
        } else {
            $error = "Clave incorrecta";
        }
    } else {
        $error = "Usuario no existe";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Flota</title>
</head>
<body>
    <h1>Hundir la Flota: Login</h1>
    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST">
        Usuario: <input type="text" name="nombre" required><br><br>
        Clave: <input type="password" name="clave" required><br><br>
        <input type="submit" name="login" value="Entrar a la Batalla">
    </form>
</body>
</html>