<h1 class="page-header">CRUD con el patrón MVC en PHP POO y PDO </h1>


<a class="btn btn-primary pull-right" href="?c=Tienda&a=Crud">Agregar</a>
<br><br><br>

<table class="table table-striped table-hover table-responsive" id="tabla">
    <thead>
    <tr>
        <th scope="col" class="col-xs-2" style="width:120px; background-color: #5DACCD; color:#fff">Código</th>
        <th scope="col" class="col-xs-6" style="width:180px; background-color: #5DACCD; color:#fff">Nombre</th>
        <th scope="col" class="col-xs-2" style="background-color: #5DACCD; color:#fff">Teléfono</th>
        <th scope="col" class="col-xs-1" style="background-color: #5DACCD; color:#fff"></th>
        <th scope="col" class="col-xs-1" style="background-color: #5DACCD; color:#fff"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->getController()->tiendas as $tienda): ?>
        <tr>
            <td class="col-xs-2" scope="row"><?php echo $tienda->getTiendaCod(); ?></td>
            <td class="col-xs-6"><?php echo $tienda->getTiendaNombre(); ?></td>
            <td class="col-xs-2"><?php echo $tienda->getTiendaTlf(); ?></td>
            <td class="col-xs-1">
                <a class="btn btn-warning" href="?c=Tienda&a=Crud&codigo=<?php echo $tienda->getTiendaCod(); ?>">Editar</a>
            </td>
            <td class="col-xs-1">
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                   href="?c=Tienda&a=Eliminar&codigo=<?php echo $tienda->getTiendaCod(); ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
<script src="assets/js/datatable.js">

</script>


</html>