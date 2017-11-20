<?php
$string = '';
if (isset($_POST['nombre']) && isset($_POST['mensaje'])) {
    $FILE = "datos.txt";
    $myfile = fopen($FILE, "a") or die("Unable to open file!");

    $string = '------------------------------------------------------' . PHP_EOL;
    $string .= $_POST['nombre'] . PHP_EOL;
    $string .= $_POST['mensaje'] . PHP_EOL;
    $string .= '------------------------------------------------------' . PHP_EOL;

    fwrite($myfile, $string);
    fclose($myfile);
}
?>
<html>
<body>
<?php echo '<pre>' . $string . '</pre>'; ?>
<form action="" method="post">
    Introduzca su nombre: <br/>
    <input type="text" name="nombre" id="nombre"/> <br/>
    Comentarios sobre esta página web: <br/>
    <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea> <br/>
    <input type="submit" value="Enviar comentario"/>
</form>
</body>
</html>
