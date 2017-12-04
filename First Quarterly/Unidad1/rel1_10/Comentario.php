<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 04/12/2017
 * Time: 9:25
 */

class Comentario
{
    public $id;
    public $idEstudiante;
    public $mensaje;

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