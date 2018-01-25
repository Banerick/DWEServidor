<h1 class="page-header">
    <?php echo $tienda->getTiendaCod() != null ? $tienda->getTiendaNombre() : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Tienda">Tienda</a></li>
    <li class="active"><?php echo $tienda->getTiendaCod() != null ? $tienda->getTiendaNombre() : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=cliente&amp;a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $tienda->getTiendaCod(); ?>"/>
    <div class="form-group">
        <label>Código</label>
        <input type="text" name="tienda_cod" value="<?php echo $tienda->getTiendaCod(); ?>" class="form-control"
               placeholder="Ingrese el código de tienda" required>
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="tienda_nombre" value="<?php echo $tienda->getTiendaNombre(); ?>" class="form-control"
               placeholder="Ingrese el nombre de la tienda" required>
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="tienda_tlf" value="<?php echo $tienda->getTiendaTlf(); ?>" class="form-control"
               placeholder="Ingrese el teléfono de contacto" required>
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