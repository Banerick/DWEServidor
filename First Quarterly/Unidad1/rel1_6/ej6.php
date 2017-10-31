<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 31/10/2017
 * Time: 09:51
 */
if (isset($_POST['mes']) && isset($_POST['dia'])) calcularDiferencia($_POST['dia'], $_POST['mes']);

function calcularDiferencia($dia, $mes)
{
    $anyo = date('Y');
    if ((date('m') > $mes) || (date('d') > $dia && date('m') == $mes)) $anyo = date('Y', strtotime('+1 year'));

    $fechaActual = new DateTime();
    $fechaCumple = new DateTime($anyo . '-' . $mes . '-' . $dia);
    $diferencia = $fechaCumple->diff($fechaActual);
    $cumple = $diferencia->format('%a días, %H horas, %i minutos y %s segundos');
    echo "Te quedan $cumple para tu cumpleaños";
}

?>

<html>
<body>
<form action="" method="post">
    Día:<br>
    <input type="text" name="dia"><br>
    Mes:<br>
    <input type="text" name="mes"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
