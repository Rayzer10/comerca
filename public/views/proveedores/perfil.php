<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/proveedor" class="btn btn-warning btn-lg btn-floating" title="Atrás">
                <i class="fa-regular fa-circle-left"></i>
            </a>
        </div>
    </div>
    <div class="perfil">
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Cédula</div>
                <?= strtoupper($data->rif) ?>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Nombre</div>
                <?= strtoupper($data->nombre) ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Teléfono</div>
                <?= $data->telefono ?>
            </div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?=url_global?>/proveedor/editar" method="GET" style="display:initial">
                    <button type="submit" class="btn btn-text bg-base-color" title="Editar">
                        <i class="fa-solid fa-user-pen"></i> Editar
                    </button>
                    <input type="hidden" name="rif" value="<?=$rif?>">
                </form>
                    <button type="submit" class="btn btn-danger btn-text btn-delete" title="Eliminar">
                        <i class="fa-solid fa-trash"></i> Eliminar
                    </button>
                    <input type="hidden" name="rif_delete" value="<?=$data->rif?>">
            </div>
        </div>
    </div>
</main>
<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/proveedor.js"></script>
<?php include("public/views/assets/footer.php") ?>