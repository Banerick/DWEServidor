<?php

class DBConnection
{
    const USERNAME = "root";
    const PASSWORD = "";
    const HOST = "localhost";
    const DB = "instituto";

    private function getConnection()
    {
        $username = self::USERNAME;
        $password = self::PASSWORD;
        $host = self::HOST;
        $db = self::DB;
        $connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        return $connection;
    }

    public function queryList($sql, $args = null)
    {
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        if (!empty($args))
            $stmt->execute($args);
        else
            $stmt->execute();
        return $stmt;
    }

    public function createTables()
    {
        $estudiante = "CREATE TABLE IF NOT EXISTS Estudiante (
          id INT(11) NOT NULL AUTO_INCREMENT,
          nombre VARCHAR(255),
          apellidos VARCHAR(255),
          email VARCHAR(255),
          telefono INT(9),
          tutor VARCHAR(255),
          grupo VARCHAR(255),
          fechaInicio VARCHAR(255)
        )";
        $this->queryList($estudiante);

        $comentario = "CREATE TABLE IF NOT EXISTS Comentario (
          id INT(11) NOT NULL AUTO_INCREMENT,
          idEstudiante INT(11),
          mensaje VARCHAR(255)
        )";
        $this->queryList($comentario);
    }
}

/*
 * MODELO
 */

class Estudiante
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono;
    private $tutor;
    private $grupo;
    private $fechaInicio;

    public function __construct($id, $nombre, $apellidos, $email, $telefono, $tutor, $grupo, $fechaInicio)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->tutor = $tutor;
        $this->grupo = $grupo;
        $this->fechaInicio = $fechaInicio;
    }

    public function guardar()
    {
        global $DBCon;
        $query = "INSERT INTO Estudiante VALUES (:id, :nombre, :apellidos, :email, :telefono, :tutor, :grupo, :fechaInicio)
                  ON DUPLICATE KEY UPDATE nombre = :nombre, apellidos = :apellidos, email = :email, telefono = :telefono, grupo = :grupo";
        $args = array(":id" => $this->id, ":nombre" => $this->nombre, ":apellidos" => $this->apellidos, ":email" => $this->email,
            ":telefono" => $this->telefono, ":tutor" => $this->tutor, ":grupo" => $this->grupo, ":fechaInicio" => $this->fechaInicio);
        $stm = $DBCon->queryList($query, $args);
        return $stm;
    }
}

class Comentario
{
    private $id;
    private $idEstudiante;
    private $mensaje;

    public function __construct($id = null, $idEstudiante, $mensaje)
    {
        $this->id = $id;
        $this->idEstudiante = $idEstudiante;
        $this->mensaje = $mensaje;
    }

    public function guardar()
    {
        global $DBCon;
        $query = "INSERT INTO Comentario VALUES (:id, :idEstudiante, :mensaje)
                  ON DUPLICATE KEY UPDATE idEstudiante = :idEstudiante, mensaje = :mensaje";
        $args = array(":id" => $this->id, ":idEstudiante" => $this->idEstudiante, ":mensaje" => $this->mensaje);
        $stm = $DBCon->queryList($query, $args);
        return $stm;
    }
}

/*
 * VISTA
 */

class EstudiantesView
{
    private $estudiantes;

    public function __construct()
    {
        global $DBCon;
        $this->estudiantes = array();
        foreach ($DBCon->queryList('SELECT * FROM Estudiante ORDER BY apellidos')->fetchAll() as $row) {
            $this->estudiantes[] = new Estudiante($row['id'], $row['nombre'], $row['apellidos'], $row['email'], $row['telefono'], $row['tutor'], $row['grupo'], $row['fechaInicio']);
        }
    }

    public function display()
    {
        echo "<table>";
        echo '<tr id="estudiantes">
             <td>Nombre</td>
             <td>Apellidos</td>
             <td>Email</td>
             <td>Telefono</td>
             <td>Tutor</td>
             <td>Grupo</td>
             <td>FechaDeInicio</td>
             <td>IdEstudiante</td>
           </tr>';
        foreach ($this->estudiantes as $estudiante) {
            echo '<tr class="estudiante">
               <td>' . $estudiante->nombre . '</td>
               <td>' . $estudiante->apellidos . '</td>
               <td>' . $estudiante->email . '</td>
               <td>' . $estudiante->telefono . '</td>
               <td>' . $estudiante->tutor . '</td>
               <td>' . $estudiante->grupo . '</td>
               <td>' . $estudiante->fechaInicio . '</td>
               <td>' . $estudiante->id . '</td>
             </tr>';
        }
        echo '</table>';
    }
}

class ComentariosView
{
    private $comentarios;

    public function __construct()
    {
        global $DBCon;
        $this->comentarios = array();
        foreach ($DBCon->queryList('SELECT * FROM Comentario ORDER BY id')->fetchAll() as $row) {
            $this->comentarios[] = new Comentario($row['id'], $row['idEstudiante'], $row['mensaje']);
        }
    }

    public function display()
    {
        echo "<table>";
        echo '<tr id="comentarios">
             <td>id</td>
             <td>idEstudiante</td>
             <td>Mensaje</td>
           </tr>';
        foreach ($this->comentarios as $comentario) {
            echo '<tr class="comentario">
               <td>' . $comentario->id . '</td>
               <td>' . $comentario->idEstudiante . '</td>
               <td>' . $comentario->mensaje . '</td>
             </tr>';
        }
        echo '</table>';
    }
}

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
