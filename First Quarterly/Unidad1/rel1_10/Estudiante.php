<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 04/12/2017
 * Time: 9:25
 */

class Estudiante
{
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $tutor;
    public $grupo;
    public $fechaInicio;

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