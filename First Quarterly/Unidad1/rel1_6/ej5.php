<?php
$multarray = array
(
    'Miedo' => array("Pelicula de miedo 1", "Pelicula de miedo 2", "Pelicula de miedo 3"),
    'Amor' => array("Pelicula romantica 1", "Pelicula Romantica 2", "Pelcula Romantia 3"),
    'Accion' => array("Pelicula de Acción 1", "Pelicula de Accion 2", "Pelicula de Accion 3"),
);

foreach ($multarray as $genero => $peliculas) {
    echo $genero;
    echo '<ul>';
    foreach ($peliculas as $pelicula) {
        echo '<li>' . $pelicula . '</li>';
    }
    echo '</ul>';
}