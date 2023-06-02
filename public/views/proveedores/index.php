<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/proveedor/formulario" class="btn btn-text bg-base-color" title="Nuevo Proveedor">
            <i class="fa-solid fa-plus"></i> Nuevo Proveedor
        </a>
        </div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>rif</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1; ?>
            <?php foreach($data as $rows): ?>
                <tr>
                    <td><?= $num ?></td>
                    <td><?= $rows->rif ?></td>
                    <td><?= $rows->nombre ?></td>
                    <td><?= $rows->telefono ?></td>
                    <td>
                        <a href="<?=url_global?>/proveedor/perfil?rif=<?=urlencode(base64_encode($rows->rif))?>" title="Ver datos">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            <?php $num++ ?>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>N°</th>
                <th>rif</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>
</main>

<?php include("public/views/assets/scripts.php") ?>
<?php include("public/views/assets/footer.php") ?>