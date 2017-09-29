<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 29/09/2017
 * Time: 08:40
 */

// http://www.iesayala.com/moodle/pluginfile.php/5738/mod_label/intro/Relación_1.1.pdf

// 1
function tablaDel($numero)
{
    echo "<h1>Tabla del " . $numero . "</h1>";
    echo "<table>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        echo "<td>" . $numero . "</td><td>" . $i . "</td><td>" . $numero * $i . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

tablaDel(10);

// 2
function tabla1al100()
{
    echo "<h1>Tabla del 1 al 100</h1>";
    echo "<table>";
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 10 == 1) echo "<tr>";
        echo "<td>" . $i . "</td>";
        if ($i % 10 == 0) echo "</tr>";
    }
    echo "</table>";
}

tabla1al100();

// 3
function tabla1al100Multicolor()
{
    define("TAM", 10);
    echo "<h1>Tabla del 1 al 100 - Alternativa</h1>";
    echo "<table>";
    for ($i = 0; $i <= 9; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= 9; $j++) echo "<td bgcolor='" . (($i + $j) % 2 == 0 ? 'white' : 'lightgray') . "'>" . ((10 * $i + 1) + $j) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

tabla1al100Multicolor();

// 4
function testDefine()
{
    define("VAR1", "pepe");
    define("VAR2", "manolo");
    var_dump(VAR1);
    var_dump(VAR2);
    define("VAR1", "paco");
    var_dump(VAR1);
}

testDefine();

// 5
function potenciasHasta4()
{
    echo "<h1>Potencias hasta 4</h1>";
    echo "<table>";
    for ($i = 1; $i <= 4; $i++) {
        echo "<tr>";
        for ($j = 0; $j <= 3; $j++) echo "<td>" . pow($i, $j) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

potenciasHasta4();