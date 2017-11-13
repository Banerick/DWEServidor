<?php
$FILE = "visitas.txt";
$myfile = fopen($FILE, "r+") or die("Unable to open file!");
$cont = fread($myfile, filesize("visitas.txt"));
rewind($myfile);
echo "Visitas: " . $cont;
$cont++;
$myfile = fopen($FILE, "w") or die("Unable to open file!");
fwrite($myfile, $cont++);
fclose($myfile);