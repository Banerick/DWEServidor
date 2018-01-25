<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 25/01/2018
 * Time: 9:48
 */

class Tiendas
{
    const TABLENAME = 'tienda';
    private $dbcon;
    public $tiendas;

    /**
     * Tiendas constructor.
     */
    public function __construct()
    {
        $this->dbcon = new DBConnection();
        $this->tiendas = array();
        $this->loadTiendas();
    }

    private function loadTiendas()
    {
        $query = 'SELECT * FROM ' . TABLENAME . ';';
        $stmt = $this->dbcon->queryList($query);
        $data = $stmt->fetchAll();
        foreach ($data as $tienda) {
            $this->tiendas[$tienda['tienda_cod']] = new Tienda($tienda['tienda_cod'], $tienda['tienda_nombre'], $tienda['tienda_tlf']);
        }
        $stmt->closeCursor();
    }

    public function addTienda($tienda)
    {
        $query = 'INSERT INTO ' . TABLENAME . ' VALUES (:codigo, :nombre, :telefono);';
        $params = array(':codigo' => $tienda->tienda_cod, ':nombre' => $tienda->tienda_nombre, ':telefono' => $tienda->tienda_tlf);
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            $this->tiendas[$tienda->tienda_cod] = $tienda;
        }
        $stmt->closeCursor();
    }

    public function delTienda($tienda_cod)
    {
        $query = 'DELETE FROM ' . TABLENAME . ' WHERE tienda_cod = :codigo;';
        $params = array(':codigo' => $$tienda_cod);
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            unset($this->tiendas[$tienda_cod]);
        }
        $stmt->closeCursor();
    }

    public function updateTienda($tienda)
    {
        $query = 'UPDATE ' . TABLENAME . ' SET tienda_nombre = :nombre, tienda_tlf = :telefono WHERE tienda_cod = :codigo;';
        $params = array(':codigo' => $tienda->tienda_cod, ':nombre' => $tienda->tienda_nombre, ':telefono' => $tienda->tienda_tlf);
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            $this->tiendas[$tienda->tienda_cod] = $tienda;
        }
        $stmt->closeCursor();
    }
}