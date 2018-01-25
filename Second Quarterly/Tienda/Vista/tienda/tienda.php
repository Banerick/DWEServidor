<h1 class="page-header">CRUD con el patrón MVC en PHP POO y PDO </h1>


<a class="btn btn-primary pull-right" href="?c=Tienda&a=Crud">Agregar</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
    <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">Código</th>
        <th style="width:180px; background-color: #5DACCD; color:#fff">Nombre</th>
        <th style="background-color: #5DACCD; color:#fff">Teléfono</th>
        <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->listar() as $tienda): ?>
        <tr>
            <td><?php echo $tienda->tienda_cod; ?></td>
            <td><?php echo $tienda->tienda_nombre; ?></td>
            <td><?php echo $tienda->tienda_tlf; ?></td>
            <td>
                <a class="btn btn-warning" href="?c=Tienda&a=Crud&id=<?php echo $tienda->id; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                   href="?c=Tienda&a=Eliminar&id=<?php echo $tienda->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
<script src="assets/js/datatable.js">

</script>


</html>