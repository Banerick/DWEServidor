<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 31/10/2017
 * Time: 09:51
 */
$random = isset($_COOKIE['random']) ? $_COOKIE['random'] : setRandom();

function setRandom()
{
    $ret = rand(0, 100);
    setcookie("random", $ret, time() + 60 * 60 * 24 * 100, "/");
    return $ret;
}

if (isset($_POST['comprobar'])) {
    if ($_POST['comprobar'] == $random) {
        echo "Has acertado!!<br/>";
        echo "Hemos generado un nuevo número aleatorio.<br/>";
        $random = setRandom(0, 100);
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
    <input type="submit" name="action" value="Comprobar">
</form>

<script type="text/javascript">
    console.log("Trampas, trampas!! El número generado es <?php echo $random; ?>");
</script>
</body>
</html>
