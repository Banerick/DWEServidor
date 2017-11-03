<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>
<body>
<?php

$nombre = "";
if (!empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}

$apellidos = "";
if (!empty($_POST['apellido'])) {
    $apellidos = $_POST['apellido'];
}

$movil = "";
if (!empty($_POST['tel'])) {
    $movil = $_POST['tel'];
}

$archivo = "Agenda.txt";

$file = @fopen($archivo, "a");

fwrite($file, $nombre . '-' . $apellidos . '-' . $movil);
echo '<br>';

fclose($file);

?>
<form method="post">

    <fieldset>
        <label>
            <b>Nombre - </b>
            <input type="text" name="nombre">
        </label>
    </fieldset>


    <fieldset>
        <label>
            <b>Apellido - </b>
            <input type="text" name="apellido">
        </label>
    </fieldset>


    <fieldset>
        <label>
            <b>Teléfono - </b>
            <input type="text" name="tel">
        </label>
    </fieldset>


    <fieldset>
        <button type="submit" name="enviar">Insertar</button>
    </fieldset>

</form>

</body>
</html>