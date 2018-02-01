/**
* Created by PhpStorm.
* User: Alfonso
* Date: 31/01/2018
* Time: 13:31
*/
<h1 class="page-header">CRUD con el patrón MVC en PHP POO y PDO </h1>


<a class="btn btn-primary pull-right" href="?c=Producto&a=Crud">Agregar</a>
<br><br><br>

<table class="table table-striped table-hover table-responsive" id="tabla">
    <thead>
    <tr>
        <th scope="col" class="col-xs-2" style="width:120px; background-color: #5DACCD; color:#fff">Código</th>
        <th scope="col" class="col-xs-6" style="width:180px; background-color: #5DACCD; color:#fff">Nombre</th>
        <th scope="col" class="col-xs-2" style="background-color: #5DACCD; color:#fff">Nombre corto</th>
        <th scope="col" class="col-xs-2" style="background-color: #5DACCD; color:#fff">Pvp</th>
        <th scope="col" class="col-xs-2" style="background-color: #5DACCD; color:#fff">Descripcion</th>
        <th scope="col" class="col-xs-2" style="background-color: #5DACCD; color:#fff">Familia</th>
        <th scope="col" class="col-xs-1" style="background-color: #5DACCD; color:#fff"></th>
        <th scope="col" class="col-xs-1" style="background-color: #5DACCD; color:#fff"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->getController()->productos as $producto): ?>
        <tr>
            <td class="col-xs-2" scope="row"><?php echo $producto->getProductoCod(); ?></td>
            <td class="col-xs-6"><?php echo $producto->getProductoNombre(); ?></td>
            <td class="col-xs-6"><?php echo $producto->getProductoNombrecorto(); ?></td>
            <td class="col-xs-6"><?php echo $producto->getProductoPvp(); ?></td>
            <td class="col-xs-6"><?php echo $producto->getProductoDescripcion(); ?></td>
            <td class="col-xs-6"><?php echo $producto->getProductoFamilia(); ?></td>

            <td class="col-xs-1">
                <a class="btn btn-warning" href="?c=Producto&a=Crud&codigo=<?php echo $producto->getProductoCod(); ?>">Editar</a>
            </td>
            <td class="col-xs-1">
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                   href="?c=Producto&a=Eliminar&codigo=<?php echo $producto->getProductoCod(); ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
<script src="assets/js/datatable.js">

</script>


</html>