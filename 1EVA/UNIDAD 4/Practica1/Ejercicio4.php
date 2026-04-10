<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 4</title>
        <meta charset="UTF-8">
<style>
    table{
border-collapse: collapse;
    }
    th, td {
        border: 1px solid #444;
        padding: 8px 12px;
        text-align: center;
    }
    th {
        background-color: blue;
        color:white;
    }
    td{
        background-color: white;
    }
</style>
    </head> 
    <body>
    <form method="post" action="">
        <label for="mes">Introduce un mes:</label>
        <input type="number" id="mes" name="mes" min="1" max="12" required>
        <label for="anio"> Introduce un año:</label>
        <input type="number" id="anio" name="anio" min="1900" max="2100" required>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_POST ['mes'], $_POST ['anio'])) {
        $mes=intval($_POST['mes']);
        $anio=intval($_POST['anio']);

        $primerDiaSemana=date("N",mktime(0,0,0,$mes,1,$anio));
        $diasMes=date("t",mktime(0,0,0,$mes,1,$anio));

        echo "<h2>Calendario de $mes/$anio</h2>";
        echo "<table>";
        echo "<tr><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>";

        for ($i=1;$i<$primerDiaSemana;$i++){
            echo "<td></td>";
        }

        for($dia=1;$dia<=$diasMes;$dia++){
            echo "<td>$dia</td>";
            if (($dia + $primerDiaSemana - 1) % 7 == 0){
                echo "</tr><tr>";
            }
        }

        while (($dia + $primerDiaSemana - 1) % 7 != 1){
            echo "<td></td>";
            $dia++;
        }   
        echo "</tr>";
        echo "</table>";
    }

    ?>

        
    </body>
</html>