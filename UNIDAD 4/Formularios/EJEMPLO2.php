<?php
$suma=null;

if (isset ($_POST['num1']) && isset ($_POST ['num2'])) {
    $suma=$_POST['num1']+$_POST['num2'];
}
?>

<html>
    <body>
        <form method="post" action="EJEMPLO2.php">
            <label for="num1">Number 1:</label>
            <input id="num1" name="num1">
            <br> <br>
            <label for="num2">Number 2:</label>
            <input id="num2" name="num2">
            <br> <br>
            <input type="submit" value="Sum">
        </form>
    </body>
</html>
<?php
if (!is_null($suma)) {
    echo "<h1>El resultado es $suma</h1>";
}
?>


    