<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libro de visitas</title>
</head>
<body>
<?php

$nombre = "";
if (!empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}

$mensaje = "";
if (!empty($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
}

$animos = "";
if (!empty($_POST['animos'])) {
    $movil = $_POST['animos'];
}

$archivo = "Libro.txt";

$file = @fopen($archivo, "a");

fwrite($file, $nombre . '-' . $mensaje . '-' . $animos);

fclose($file);

?>
<form method="post">

    <fieldset>
        <label>
            <b>Nombre:</b>
            <input type="text" name="nombre">
        </label>
    </fieldset>


    <fieldset>
        <label>
            <b>Mensaje: </b>
            <input type="text" name="mensaje">
        </label>
    </fieldset>


    <fieldset>
        <label>
            <b>Ánimos: </b>
            <input type="text" name="animos">
        </label>
    </fieldset>


    <fieldset>
        <button type="submit" name="enviar">Enviar</button>
    </fieldset>

</form>

</body>
</html>