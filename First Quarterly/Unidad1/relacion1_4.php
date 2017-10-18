<?php
// 1
$frase1 = 'Este texto contiene una buena cantidad de letras';
function primeraA($frase) { return strpos($frase, 'a'); }
function primeraM($frase) { return strpos($frase, 'm'); }
function primeraCantidad($frase) { return strpos($frase, 'cantidad'); }
function ultimaE($frase) { return strrpos($frase, 'e', -1); }
function fraseDesdeTexto($frase) { return substr($frase, strrpos($frase, 'texto')); }
function fraseDesde15($frase) { return substr($frase, 15); }
function fraseDesde18y6($frase) { return substr($frase, 18, 6); }
function fraseDesde4a7($frase) { return substr($frase, 4, -7); }

// 2
$frase2 = 'Bienvenidos a la aventura de aprender PHP en 30 horas';
function phpPos($frase) { return strrpos($frase, 'PHP'); }
function replace($frase) { return str_replace('aventura', '<b>misión</b>', $frase); }

// 3
echo '<a href= "/arbol/prueba.php" class="prueba" onmouseOver="status=\'hola\';
return trae;">pruebade\enlace</a>';