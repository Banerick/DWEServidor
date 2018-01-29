<?php
require 'Tiendas.php';

class TiendaController
{

    private $controller;

    public function __CONSTRUCT()
    {
        $this->controller = new Tiendas();
    }

    public function Index()
    {
        require_once 'Vista/header.php';
        require_once 'Vista/tienda/tienda.php';

    }

    public function getController() {
        return $this->controller;
    }

    public function Crud()
    {
        require_once 'Modelo/Tienda.php';
        $tienda = new Tienda();

        if (isset($_REQUEST['codigo'])) {
            $tienda = $this->controller->tiendas[$_REQUEST['codigo']];
        }

        require_once 'Vista/header.php';
        require_once 'Vista/tienda/tienda-editar.php';

    }

    public function Guardar()
    {
        require_once 'Modelo/Tienda.php';
        $tienda = new Tienda();

        $tienda->setTiendaCod($_REQUEST['tienda_cod']);
        $tienda->setTiendaNombre($_REQUEST['tienda_nombre']);
        $tienda->setTiendaTlf($_REQUEST['tienda_tlf']);
        $tienda->Nombre = $_REQUEST['Nombre'];


        $tienda->getTiendaCod() > 0
            ? $this->controller->updateTienda($tienda)
            : $this->controller->addTienda($tienda);

        header('Location: index.php');
    }

    public function Eliminar()
    {
        $this->controller->delTienda($_REQUEST['id']);
        header('Location: index.php');
    }
}