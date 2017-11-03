<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 31/10/2017
 * Time: 09:51
 */
$random = isset($_POST['random']) ? $_POST['random'] : rand(0, 100);
if (isset($_POST['comprobar'])) {
    if ($_POST['comprobar'] == $random) {
        echo "Has acertado!!<br/>";
        echo "Hemos generado un nuevo número aleatorio.<br/>";
        $random = rand(0, 100);
    } else {
        echo "Ooooh, inténtalo de nuevo.";
    }
}
?>

<html>
<body>
<form action="" method="post">
    ¿Adivinas el número? (Entre 0 y 100):<br>
    <input type="number" name="comprobar"><br>
    <input type="hidden" name="random" value="<?php echo $random; ?>">
    <input type="submit" name="action" value="Comprobar">
</form>
</body>
</html>
