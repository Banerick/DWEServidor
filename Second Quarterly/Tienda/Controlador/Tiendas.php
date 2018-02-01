<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 25/01/2018
 * Time: 9:48
 */
require 'DBConnection.php' ;

class Tiendas
{

    private $TABLENAME;
    private $dbcon;
    public $tiendas;

    /**
     * Tiendas constructor.
     */
    public function __construct()
    {
        $this->TABLENAME = 'tienda';
        $this->dbcon = new DBConnection();
        $this->tiendas = array();
        $this->loadTiendas();
    }

    private function loadTiendas()
    {
        require_once 'Modelo/Tienda.php';
        $query = 'SELECT * FROM ' . $this->TABLENAME . ';';
        $stmt = $this->dbcon->queryList($query);
        $data = $stmt->fetchAll();
        foreach ($data as $tienda) {
            $this->tiendas[$tienda['tienda_cod']] = new Tienda($tienda['tienda_cod'], $tienda['tienda_nombre'], $tienda['tienda_tlf']);
        }
        $stmt->closeCursor();
    }

    public function addTienda($tienda)
    {
        $query = 'INSERT INTO ' . $this->TABLENAME . ' VALUES (:codigo, :nombre, :telefono);';
        $params = array(':codigo' => $tienda->getTiendaCod(), ':nombre' => $tienda->getTiendaNombre(), ':telefono' => $tienda->getTiendaTlf());
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            $this->tiendas[$tienda->getTiendaCod()] = $tienda;
        }
        $stmt->closeCursor();
    }

    public function delTienda($tienda_cod)
    {
        $query = 'DELETE FROM ' . $this->TABLENAME . ' WHERE tienda_cod = :codigo;';
        $params = array(':codigo' => $tienda_cod);
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            unset($this->tiendas[$tienda_cod]);
        }
        $stmt->closeCursor();
    }

    public function updateTienda($tienda)
    {
        $query = 'UPDATE ' . $this->TABLENAME . ' SET tienda_nombre = :nombre, tienda_tlf = :telefono WHERE tienda_cod = :codigo;';
        $params = array(':codigo' => $tienda->getTiendaCod(), ':nombre' => $tienda->getTiendaNombre(), ':telefono' => $tienda->getTiendaTlf());
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            $this->tiendas[$tienda->getTiendaCod()] = $tienda;
        }
        $stmt->closeCursor();
    }
}