<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 22/01/2018
 * Time: 9:30
 */

class Tienda
{
    private $tienda_cod;
    private $tienda_nombre;
    private $tienda_tlf;

    /**
     * Tienda constructor.
     * @param $tienda_cod
     * @param $tienda_nombre
     * @param $tienda_tlf
     */
    public function __construct($tienda_cod = 00000, $tienda_nombre = 'Ejemplo', $tienda_tlf = '666555444')
    {
        $this->tienda_cod = $tienda_cod;
        $this->tienda_nombre = $tienda_nombre;
        $this->tienda_tlf = $tienda_tlf;
    }

    /**
     * @return mixed
     */
    public function getTiendaCod()
    {
        return $this->tienda_cod;
    }

    /**
     * @param mixed $tienda_cod
     */
    public function setTiendaCod($tienda_cod): void
    {
        $this->tienda_cod = $tienda_cod;
    }

    /**
     * @return mixed
     */
    public function getTiendaNombre()
    {
        return $this->tienda_nombre;
    }

    /**
     * @param mixed $tienda_nombre
     */
    public function setTiendaNombre($tienda_nombre): void
    {
        $this->tienda_nombre = $tienda_nombre;
    }

    /**
     * @return mixed
     */
    public function getTiendaTlf()
    {
        return $this->tienda_tlf;
    }

    /**
     * @param mixed $tienda_tlf
     */
    public function setTiendaTlf($tienda_tlf): void
    {
        $this->tienda_tlf = $tienda_tlf;
    }


}