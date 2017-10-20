<?php
/**
 * Created by PhpStorm.
 * User: Antonio Terrero Algaba
 * Date: 20/10/2017
 * Time: 09:28
 */

print('<h1>Manejo de cadenas</h1>');

// 1
print('<h2>Ejemplo 1</h2>');
function calcula_extension($fichero)
{
    $str = explode('.', $fichero);
    return strtoupper(trim($str[sizeof($str) - 1]));
}

function tipo_fichero($extension)
{
    switch ($extension) {
        case 'PDF':
            return 'Documento Adobe PDF';
        case 'TXT':
            return 'Documento de texto';
        case 'HTM':
        case 'HTML':
            return 'Documento HTML';
        case 'PPT':
            return 'Presentación Microsoft Powerpoint';
        case 'DOC':
            return 'Documento Microsoft Word';
        case 'GIF':
            return 'Imagen GIF';
        case 'JPG':
            return 'Imagen JPG';
        case 'ZIP':
            return 'Archivo comprimido ZIP';
        default:
            return "Archivo $extension";
    }
}

$fichero = 'curriculum.pdf';
$extension = calcula_extension($fichero);
$tipo = tipo_fichero($extension);
print("El fichero '$fichero' es de tipo '$tipo'. \n");

// 2
print('<h2>Ejemplo 2</h2>');
$texto = "uno-dos-tres-cuatro-cinco";
$texto_separado = explode('-', $texto);
print('<ul>');
foreach ($texto_separado as $palabra) {
    print("<li>$palabra</li>");
}
print('</ul>');