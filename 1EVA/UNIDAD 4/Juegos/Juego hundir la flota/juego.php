<?php
session_start();
if (!isset($_SESSION['id_usuario'])) { header("Location: index.php"); exit(); }

// Configuración
$filas = 5;
$cols = 5;
$num_barcos = 3;

// =======================================================================
// 1. INICIALIZACIÓN (Si no existe tablero, lo creamos)
// =======================================================================
if (!isset($_SESSION['flota_visible'])) {
    
    // A. Inicializar arrays vacíos
    $tablero_real = [];   // 0 = Agua, 1 = Barco
    $tablero_visible = []; // '?' = Oculto, 'A' = Agua, 'X' = Tocado
    
    for ($f = 0; $f < $filas; $f++) {
        for ($c = 0; $c < $cols; $c++) {
            $tablero_real[$f][$c] = 0; 
            $tablero_visible[$f][$c] = '?';
        }
    }

    // B. Colocar barcos aleatorios
    $colocados = 0;
    while ($colocados < $num_barcos) {
        $f_rand = rand(0, $filas - 1);
        $c_rand = rand(0, $cols - 1);
        
        // Si hay agua, ponemos barco
        if ($tablero_real[$f_rand][$c_rand] == 0) {
            $tablero_real[$f_rand][$c_rand] = 1;
            $colocados++;
        }
    }

    // Guardar en sesión
    $_SESSION['flota_real'] = $tablero_real;
    $_SESSION['flota_visible'] = $tablero_visible;
    $_SESSION['barcos_restantes'] = $num_barcos;
    $_SESSION['disparos'] = 0;
    $_SESSION['mensaje'] = "Encuentra los $num_barcos barcos enemigos.";
}

// Cargar variables para usar abajo
$visible = $_SESSION['flota_visible']; 
$mensaje = $_SESSION['mensaje'];

// =======================================================================
// 2. PROCESAR DISPARO
// =======================================================================
if (isset($_POST['coordenada'])) {
    // El value viene como "fila,columna" (ej: "0,4")
    $parts = explode(',', $_POST['coordenada']);
    $f = $parts[0];
    $c = $parts[1];

    // Verificamos que no haya disparado ahí ya
    if ($visible[$f][$c] == '?') {
        $_SESSION['disparos']++;

        // ¿Había barco?
        if ($_SESSION['flota_real'][$f][$c] == 1) {
            // TOCADO
            $_SESSION['flota_visible'][$f][$c] = 'X';
            $_SESSION['barcos_restantes']--;
            $_SESSION['mensaje'] = "<span style='color:green'>¡Tocado y Hundido!</span>";
        } else {
            // AGUA
            $_SESSION['flota_visible'][$f][$c] = 'A';
            $_SESSION['mensaje'] = "<span style='color:blue'>Agua...</span>";
        }
    }
}

// Recargamos el tablero visible actualizado
$visible = $_SESSION['flota_visible'];
$mensaje = $_SESSION['mensaje'];

// =======================================================================
// 3. COMPROBAR VICTORIA
// =======================================================================
if ($_SESSION['barcos_restantes'] <= 0) {
    // Puntos: Empezamos con 50 y restamos 1 por cada disparo. Mínimo 0.
    $puntos = max(0, 50 - $_SESSION['disparos']);
    
    $_SESSION['puntos_finales'] = $puntos;
    header("Location: fin.php?resultado=victoria");
    exit();
}

// Botón Reiniciar
if (isset($_POST['reiniciar'])) {
    unset($_SESSION['flota_visible']); // Borrar esto fuerza la reinicialización
    header("Location: juego.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hundir la Flota</title>
    <style>
        body { font-family: sans-serif; text-align: center; }
        table { margin: 0 auto; border-collapse: collapse; }
        td { width: 50px; height: 50px; border: 1px solid #333; padding:0; }
        
        /* Estilos de botones */
        .btn { width: 100%; height: 100%; border: none; font-size: 20px; cursor: pointer; }
        .oculto { background: #ddd; }
        .agua { background: #aaf; color: blue; font-weight:bold; }
        .barco { background: #f88; color: darkred; font-weight:bold; }
    </style>
</head>
<body>
    <h1>Tablero de Batalla</h1>
    <p>Barcos restantes: <b><?php echo $_SESSION['barcos_restantes']; ?></b> | Disparos: <b><?php echo $_SESSION['disparos']; ?></b></p>
    <p><?php echo $mensaje; ?></p>

    <form method="POST">
        <table>
            <?php foreach ($visible as $f => $fila): ?>
                <tr>
                    <?php foreach ($fila as $c => $valor): ?>
                        <td>
                            <?php if ($valor == '?'): ?>
                                <button type="submit" name="coordenada" value="<?php echo "$f,$c"; ?>" class="btn oculto"></button>
                            <?php elseif ($valor == 'A'): ?>
                                <div class="btn agua">~</div>
                            <?php elseif ($valor == 'X'): ?>
                                <div class="btn barco">💥</div>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <input type="submit" name="reiniciar" value="Reiniciar Partida">
    </form>
</body>
</html>