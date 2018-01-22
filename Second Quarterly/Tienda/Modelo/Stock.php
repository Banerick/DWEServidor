<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 22/01/2018
 * Time: 9:36
 */

class Stock
{
    private $stock_producto;
    private $stock_tienda;
    private $stock_unidades;

    /**
     * Stock constructor.
     * @param $stock_producto
     * @param $stock_tienda
     * @param $stock_unidades
     */
    public function __construct($stock_producto, $stock_tienda, $stock_unidades)
    {
        $this->stock_producto = $stock_producto;
        $this->stock_tienda = $stock_tienda;
        $this->stock_unidades = $stock_unidades;
    }

    /**
     * @return mixed
     */
    public function getStockProducto()
    {
        return $this->stock_producto;
    }

    /**
     * @param mixed $stock_producto
     */
    public function setStockProducto($stock_producto): void
    {
        $this->stock_producto = $stock_producto;
    }

    /**
     * @return mixed
     */
    public function getStockTienda()
    {
        return $this->stock_tienda;
    }

    /**
     * @param mixed $stock_tienda
     */
    public function setStockTienda($stock_tienda): void
    {
        $this->stock_tienda = $stock_tienda;
    }

    /**
     * @return mixed
     */
    public function getStockUnidades()
    {
        return $this->stock_unidades;
    }

    /**
     * @param mixed $stock_unidades
     */
    public function setStockUnidades($stock_unidades): void
    {
        $this->stock_unidades = $stock_unidades;
    }


}