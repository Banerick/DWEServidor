<?php

if ($dir = opendir('C:\xampp\htdocs\Ejercicios')) {
    echo "Directorio a leer: $dir.<br/>";
    echo "Entradas:.<br/>";
    while (false !== ($entry = readdir($dir))) {
        echo "$entry.<br/>";
    }
    closedir($dir);
}
?>