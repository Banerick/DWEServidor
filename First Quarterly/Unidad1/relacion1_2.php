<?php
// 1
function riman($c1, $c2)
{
    if (strcmp(substr($c1, -3), substr($c2, -3))) echo "$c1 y $c2 riman";
    else if (strcmp(substr($c1, -2), substr($c2, -2))) echo "$c1 y $c2 riman un poco";
    else echo "$c1 y $c2 no riman";
}

// 2
function emailValido($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL)
        && preg_match('/@.+\./', $email);
}

// 3
function nickLength($nick)
{
    return strlen($nick) <= 20 && strlen($nick) >= 3;
}

function nickChar($nick)
{
    foreach ($nick as $letter) {
        if ($nick != '-' && $nick != '_' && is_string($letter) && is_int($letter)) return false;
    }
    return true;
}

// 4
function dosPrimerasPalabras($frase)
{
    return array_slice(explode(' ', $frase), 0, 2);
}

// 5
function cuentaLetra($frase, $letra) {
    return substr_count($frase, $letra);
}

//6
function numeroBinOct($numero) {
    printf("Dec: %i - Bin: %i - Oct: %i", array($numero, decbin($numero), decoct($numero)));
}

//7
function repeatLetter($frase) {
    $newFrase = '';
    foreach(str_split($frase) as $letra) {
        $newFrase .= $letra . $letra;
    }
    return $newFrase;
}