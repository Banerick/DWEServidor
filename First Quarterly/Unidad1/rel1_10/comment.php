<?php

require_once('DBConnection.php');
require_once('Estudiante.php');
require_once('Comentario.php');

$DBCon = new DBConnection();
$DBCon->createTables();


session_start();
if (!empty($_POST['idest'])) {
    $_SESSION['idEstudiante'] = $_POST['idest'];
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['apellidos'] = $_POST['apellidos'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['telefono'] = $_POST['telefono'];
    $_SESSION['tutor'] = $_POST['tutor'];
    $_SESSION['grupo'] = $_POST['grupo'];
    $_SESSION['fecha'] = $_POST['fecha'];

    $estudiante = new Estudiante($_POST['idest'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['tutor'], $_POST['grupo'], $_POST['fecha']);
    $estudiante->guardar();
} else if ($_SESSION['idEstudiante'] == 0) {
    exit('No has iniciado sesión.');
}

if (!empty($_POST['idcom'])) {
    $_SESSION['idComentario'] = $_POST['idcom'] <= 0 ? null : $_POST['idcom'];
    $_SESSION['mensaje'] = $_POST['mensaje'];

    $comentario = new Comentario($_SESSION['idComentario'], $_SESSION['idEstudiante'], $_POST['mensaje']);
    $comentario->guardar();
}

$estudiantes = new EstudiantesView();
$comentarios = new ComentariosView();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio1</title>
    <style>
        #botonazo {
            margin-left: 200px;
        }

        #estudiantes,
        #comentarios {
            background-color: rgb(255, 60, 212);
        }

        .estudiante,
        .comentario {
            background-color: rgb(227, 209, 138);
            padding: 2%;
        }

        .bloque {
            background-color: rgb(255, 247, 139);
            margin-bottom: 100px;
        }


    </style>

</head>
<body>

<div class="bloque">
    <h1>Formulario de Comentarios</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Mensaje</td>
                <td><input type="text" name="mensaje" value=""></td>
            </tr>
            <tr>
                <td>ID Comentario</td>
                <td><input type="text" name="idcom" value=""></td>
            </tr>
        </table>
        <br>
        <input id="botonazo" type="submit" value="Enviar">
    </form>

    <?php
    if (!empty($_SESSION['idComentario'])) {
        echo "Comentario insertado: Comentario(${_SESSION['idComentario']}, ${_SESSION['idEstudiante']}, ${_SESSION['mensaje']},)";
    }
    ?>

    <?php $comentarios->display(); ?>
</div>
