<?php

class TiendaController
{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Tiendas();
    }

    public function Index()
    {
        require_once 'Vista/header.php';
        require_once 'Vista/tienda/tienda.php';

    }

    public function Crud()
    {
        $tienda = new Tienda();

        if (isset($_REQUEST['codigo'])) {
            $tienda = $this->model->tiendas[$_REQUEST['codigo']];
        }

        require_once 'Vista/header.php';
        require_once 'Vista/tienda/tienda-editar.php';

    }

    public function Guardar()
    {
        $tienda = new Tienda();

        $tienda->setTiendaCod($_REQUEST['tienda_cod']);
        $tienda->setTiendaNombre($_REQUEST['tienda_nombre']);
        $tienda->setTiendaTlf($_REQUEST['tienda_tlf']);
        $tienda->Nombre = $_REQUEST['Nombre'];


        $tienda->getTiendaCod() > 0
            ? $this->model->updateTienda($tienda)
            : $this->model->addTienda($tienda);

        header('Location: index.php');
    }

    public function Eliminar()
    {
        $this->model->delTienda($_REQUEST['id']);
        header('Location: index.php');
    }
}