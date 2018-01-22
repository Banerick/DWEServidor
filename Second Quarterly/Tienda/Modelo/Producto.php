<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 22/01/2018
 * Time: 9:34
 */

class Producto
{
    private $producto_cod;
    private $producto_nombre;
    private $producto_nombrecorto;
    private $producto_descripcion;
    private $producto_pvp;
    private $producto_familia;

    /**
     * Producto constructor.
     * @param $producto_cod
     * @param $producto_nombre
     * @param $producto_nombrecorto
     * @param $producto_descripcion
     * @param $producto_pvp
     * @param $producto_familia
     */
    public function __construct($producto_cod, $producto_nombre, $producto_nombrecorto, $producto_descripcion, $producto_pvp, $producto_familia)
    {
        $this->producto_cod = $producto_cod;
        $this->producto_nombre = $producto_nombre;
        $this->producto_nombrecorto = $producto_nombrecorto;
        $this->producto_descripcion = $producto_descripcion;
        $this->producto_pvp = $producto_pvp;
        $this->producto_familia = $producto_familia;
    }

    /**
     * @return mixed
     */
    public function getProductoCod()
    {
        return $this->producto_cod;
    }

    /**
     * @param mixed $producto_cod
     */
    public function setProductoCod($producto_cod): void
    {
        $this->producto_cod = $producto_cod;
    }

    /**
     * @return mixed
     */
    public function getProductoNombre()
    {
        return $this->producto_nombre;
    }

    /**
     * @param mixed $producto_nombre
     */
    public function setProductoNombre($producto_nombre): void
    {
        $this->producto_nombre = $producto_nombre;
    }

    /**
     * @return mixed
     */
    public function getProductoNombrecorto()
    {
        return $this->producto_nombrecorto;
    }

    /**
     * @param mixed $producto_nombrecorto
     */
    public function setProductoNombrecorto($producto_nombrecorto): void
    {
        $this->producto_nombrecorto = $producto_nombrecorto;
    }

    /**
     * @return mixed
     */
    public function getProductoDescripcion()
    {
        return $this->producto_descripcion;
    }

    /**
     * @param mixed $producto_descripcion
     */
    public function setProductoDescripcion($producto_descripcion): void
    {
        $this->producto_descripcion = $producto_descripcion;
    }

    /**
     * @return mixed
     */
    public function getProductoPvp()
    {
        return $this->producto_pvp;
    }

    /**
     * @param mixed $producto_pvp
     */
    public function setProductoPvp($producto_pvp): void
    {
        $this->producto_pvp = $producto_pvp;
    }

    /**
     * @return mixed
     */
    public function getProductoFamilia()
    {
        return $this->producto_familia;
    }

    /**
     * @param mixed $producto_familia
     */
    public function setProductoFamilia($producto_familia): void
    {
        $this->producto_familia = $producto_familia;
    }
}