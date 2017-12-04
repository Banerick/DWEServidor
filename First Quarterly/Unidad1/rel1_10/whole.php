<?php

require_once('DBConnection.php');
require_once('Estudiante.php');
require_once('Comentario.php');

$DBCon = new DBConnection();
$DBCon->createTables();


if (!empty($_POST['idest'])) {
    $estudiante = new Estudiante($_POST['idest'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['tutor'], $_POST['grupo'], $_POST['fecha']);
    $estudiante->guardar();
}

if(!empty($_POST['idcom'])) {
    $comentario = new Comentario($_POST['idcom'], $_POST['idestudiante'], $_POST['mensaje']);
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
    <h1>Formulario de Estudiantes</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombre" value=""></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" name="apellidos" value=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value=""></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="telefono" value=""></td>
            </tr>
            <tr>
                <td>Tutor</td>
                <td><input type="text" name="tutor" value=""></td>
            </tr>
            <tr>
                <td>Grupo</td>
                <td><input type="text" name="grupo" value=""></td>
            </tr>
            <tr>
                <td>FechaDeInicio</td>
                <td><input type="text" name="fecha" value=""></td>
            </tr>
            <tr>
                <td>IdEstudiante</td>
                <td><input type="text" name="idest" value=""></td>
            </tr>
        </table>
        <br>
        <input id="botonazo" type="submit" value="Enviar">
    </form>

    <?php $estudiantes->display(); ?>

    <h1>Formulario de Comentarios</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>ID Estudiante</td>
                <td><input type="text" name="idestudiante" value=""></td>
            </tr>
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

    <?php $comentarios->display(); ?>
</div>
