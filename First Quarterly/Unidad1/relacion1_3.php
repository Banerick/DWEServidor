<?php
// 1
$dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
foreach ($dias as $k => $dia) echo $k . ' => ' . $dia . '<br/>';
for ($i = 0; $i < sizeof($dias); $i++) echo $i . ' => ' . $dias[$i] . '<br/>';


// 2
$alumnos = ['alu1', 'alu2', 'alu3', 'alu4', 'alu5'];
array_slice($alumnos, 0, 3);
array_splice($alumnos, 0, -2);

// 3
$colores = [
    'fuertes' => ['rojo' => 'FF0000', 'verde' => '00FF00', 'azul' => '0000FF'],
    'suaves' => ['rosa' => 'FE9ABC', 'amarillo' => 'FDF189', 'malva' => 'BC8F8F']
];
echo '<table>';
foreach ($colores as $tipo) {
    echo '<tr>';
    foreach ($tipo as $nombre => $color) {
        echo '<td style="background-color:#' . $color . '">';
        echo $nombre . ':' . $color;
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';

// 4
function check_color($colores, $color) {
    foreach($colores as $tipo) if(in_array($color, $tipo)) return true;
    return false;
}
echo 'FF88CC - ' . check_color($colores, 'FF88CC') . '<br />';
echo 'FF0000 - ' . check_color($colores, 'FF0000') . '<br />';

// 5
$pila = array("cinco" => 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);
echo asort($pila) . '<br />';
echo arsort($pila) . '<br />';
echo ksort($pila) . '<br />';
echo sort($pila) . '<br />';
echo rsort($pila) . '<br />';