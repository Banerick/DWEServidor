<?php
/**
 * Created by PhpStorm.
 * User: Alfonso
 * Date: 31/01/2018
 * Time: 14:03
 */
require 'Productos.php';

class ProductoController
{

    private $controller;

    public function __CONSTRUCT()
    {
        $this->controller = new Productos();
    }

    public function Index()
    {
        require_once 'Vista/header.php';
        require_once 'Vista/producto/producto.php';

    }

    public function getController() {
        return $this->controller;
    }

    public function Crud()
    {
        require_once 'Modelo/Producto.php';
        $producto = new Producto();

        if (isset($_REQUEST['codigo'])) {
            $producto = $this->controller->productos[$_REQUEST['codigo']];
        }

        require_once 'Vista/header.php';
        require_once 'Vista/tienda/producto-editar.php';

    }

    public function Guardar()
    {
        require_once 'Modelo/Producto.php';
        $producto = new Producto();

        $producto->setProductoCod($_REQUEST['producto_cod']);
        $producto->setProductoNombre($_REQUEST['producto_nombre']);
        $producto->setProductoNombrecorto($_REQUEST['producto_nombrecorto']);
        $producto->setProductoPvp($_REQUEST['producto_pvp']);
        $producto->setProductoFamilia($_REQUEST['producto_familia']);
        $producto->setProductoDescripcion($_REQUEST['producto_descripcion']);
        $producto->Nombre = $_REQUEST['Nombre'];


        $producto->getProductoCod() > 0
            ? $this->controller->updateProducto($producto)
            : $this->controller->addProducto($producto);

        header('Location: index.php');
    }

    public function Eliminar()
    {
        $this->controller->delProducto($_REQUEST['producto_cod']);
        header('Location: index.php');
    }
}