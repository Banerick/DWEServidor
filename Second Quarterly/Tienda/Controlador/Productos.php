<?php
/**
 * Created by PhpStorm.
 * User: Alfonso
 * Date: 31/01/2018
 * Time: 13:04
 */

class Productos
{
    private $TABLENAME;
    private $dbcon;
    public $productos;

    /**
     * Tiendas constructor.
     */
    public function __construct()
    {
        $this->TABLENAME = 'producto';
        $this->dbcon = new DBConnection();
        $this->productos = array();
        $this->loadProductos();
    }

    private function loadProductos()
    {
        require_once 'Modelo/Producto.php';
        $query = 'SELECT * FROM ' . $this->TABLENAME . ';';
        $stmt = $this->dbcon->queryList($query);
        $data = $stmt->fetchAll();
        foreach ($data as $producto) {
            $this->productos[$producto['producto_cod']] = new Producto($producto['producto_cod'], $producto['producto_nombre'], $producto['producto_nombrecorto'], $producto['producto_descripcion'], $producto['producto_pvp'], $producto['producto_familia']);
        }
        $stmt->closeCursor();
    }

    public function addProducto($producto)
    {
        $query = 'INSERT INTO ' . $this->TABLENAME . ' VALUES (:codigo, :nombre, :nombrecorto,:descripcion,:pvp,:familia);';
        $params = array(':codigo' => $producto->getProductoCod(), ':nombre' => $producto->getProductoNombre(), ':nombrecorto' => $producto->getProductoNombrecorto(), ':descripcion' => $producto->getProductoDescripcion(), ':pvp' => $producto->getProductoPvp(), ':familia' => $producto->getProductoFamilia());
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            $this->productos[$producto->getProductoCod()] = $producto;
        }
        $stmt->closeCursor();
    }

    public function delProducto($producto_cod)
    {
        $query = 'DELETE FROM ' . $this->TABLENAME . ' WHERE producto_cod = :codigo;';
        $params = array(':codigo' => $producto_cod);
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            unset($this->productos[$producto_cod]);
        }
        $stmt->closeCursor();
    }

    public function updateProducto($producto)
    {
        $query = 'UPDATE ' . $this->TABLENAME . ' SET producto_nombre = :nombre, producto_nombrecorto = :nombrecorto, producto_descripcion = :descripcion, producto_pvp = :pvp, producto_familia = :familia WHERE producto_cod = :codigo;';
        $params = array(':codigo' => $producto->getProductoCod(), ':nombre' => $producto->getProductoNombre(), ':nombrecorto' => $producto->getProductoNombrecorto(), ':descripcion' => $producto->getProductoDescripcion(), ':pvp' => $producto->getProductoPvp(), ':familia' => $producto->getProductoFamilia());
        $stmt = $this->dbcon->queryList($query, $params);
        if (!$stmt->errorCode() === '00000') {
            $this->productos[$producto->getProductoCod()] = $producto;
        }
        $stmt->closeCursor();
    }
}