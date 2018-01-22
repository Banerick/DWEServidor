<?php
/**
 * Created by PhpStorm.
 * User: ihton
 * Date: 22/01/2018
 * Time: 9:36
 */

class Familia
{
    private $familia_cod;
    private $familia_nombre;

    /**
     * Familia constructor.
     * @param $familia_cod
     * @param $familia_nombre
     */
    public function __construct($familia_cod, $familia_nombre)
    {
        $this->familia_cod = $familia_cod;
        $this->familia_nombre = $familia_nombre;
    }

    /**
     * @return mixed
     */
    public function getFamiliaCod()
    {
        return $this->familia_cod;
    }

    /**
     * @param mixed $familia_cod
     */
    public function setFamiliaCod($familia_cod): void
    {
        $this->familia_cod = $familia_cod;
    }

    /**
     * @return mixed
     */
    public function getFamiliaNombre()
    {
        return $this->familia_nombre;
    }

    /**
     * @param mixed $familia_nombre
     */
    public function setFamiliaNombre($familia_nombre): void
    {
        $this->familia_nombre = $familia_nombre;
    }


}