<?php
session_start();

if (!isset($_POST['submit'])) {
    echo '<form method="post" action="ejercicio3.php">
            Usuario: <input type="text" name="usuario"><br>
            Contraseña: <input type="password" name="clave"><br>
            <input type="submit" name="submit" value="Entrar">
          </form>';
} else {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$clave'";
    $result = $connection->query($query);

    if ($result->num_rows == 1) {
        $fila = $result->fetch_assoc();
        if ($fila['rol'] == 'grabador') {
            echo "<p>Bienvenido $usuario (rol grabador). Puedes insertar nuevos usuarios.</p>";
            // Formulario para insertar nuevo usuario
            echo '<form method="post" action="insertar.php">
                    Usuario: <input type="text" name="usuario"><br>
                    Contraseña: <input type="text" name="clave"><br>
                    Nombre: <input type="text" name="nombre"><br>
                    Apellidos: <input type="text" name="apellidos"><br>
                    Email: <input type="text" name="email"><br>
                    Rol: <select name="rol">
                            <option value="consultor">consultor</option>
                            <option value="grabador">grabador</option>
                         </select><br>
                    <input type="submit" value="Insertar">
                  </form>';
        } else {
            echo "<p>El usuario $usuario tiene rol consultor y no puede insertar registros.</p>";
        }
    } else {
        echo "<p>Usuario no existe. Vuelve al formulario.</p>";
    }
}
?>
