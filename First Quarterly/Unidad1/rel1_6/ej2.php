<?php
$archivo = "Agenda.txt";
$file = @fopen($archivo, "r");
$num_lineas = 0;
$peso = filesize($archivo);
while (($linea = fgets($file)) !== false) {
    echo "$linea . <br/>";
    $num_lineas++;
}
echo "Número de lineas = " . $num_lineas;
echo "Peso = " . $peso;
fclose($file);
?>