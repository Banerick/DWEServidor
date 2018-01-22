<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 04/12/2017
 * Time: 9:23
 */

class DBConnection
{
    const USERNAME = "root";
    const PASSWORD = "";
    const HOST = "localhost";
    const DB = "ej10";

    private function getConnection()
    {
        $username = self::USERNAME;
        $password = self::PASSWORD;
        $host = self::HOST;
        $db = self::DB;
        $connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
          id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          nombre VARCHAR(255),
          apellidos VARCHAR(255),
          email VARCHAR(255),
          telefono INT(9),
          tutor VARCHAR(255),
          grupo VARCHAR(255),
          fechaInicio VARCHAR(255)
        );";
        $this->queryList($estudiante);

        $comentario = "CREATE TABLE IF NOT EXISTS Comentario (
          id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          idEstudiante INT(11),
          mensaje VARCHAR(255)
        );";
        $this->queryList($comentario);
    }
}