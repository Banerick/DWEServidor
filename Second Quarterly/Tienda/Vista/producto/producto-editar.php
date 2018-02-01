<h1 class="page-header">
    <?php echo $producto->getProductoCod() != null ? $producto->getProductoNombre() : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Producto">Producto</a></li>
    <li class="active"><?php echo $producto->getProductoCod() != null ? $producto->getProductoNombre() : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Producto&amp;a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $producto->getProductoCod(); ?>"/>
    <div class="form-group">
        <label>Código</label>
        <input type="text" name="producto_cod" value="<?php echo $producto->getProductoCod(); ?>" class="form-control"
               placeholder="Ingrese el código del productop" required>
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="producto_nombre" value="<?php echo $producto->getProductoNombre(); ?>" class="form-control"
               placeholder="Ingrese el nombre del producto" required>
    </div>

    <div class="form-group">
        <label>PVP</label>
        <input type="text" name="producto_pvp" value="<?php echo $producto->getProductoPvp(); ?>" class="form-control"
               placeholder="Ingrese el precio del producto" required>
    </div>


    <hr/>

    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function () {
        $("#frm-alumno").submit(function () {
            return $(this).validate();
        });
    })
</script>