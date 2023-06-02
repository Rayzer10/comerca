<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/producto" class="btn btn-warning btn-lg btn-floating" title="Atrás">
                <i class="fa-regular fa-circle-left"></i>
            </a>
        </div>
    </div>
    <div class="perfil">
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Código</div>
                <?= strtoupper($data->codigo) ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Proveedor</div>
                <?= strtoupper($data->nombre_proveedor) ?>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Nombre</div>
                <?= strtoupper($data->nombre) ?>
            </div>
        </div>
        <form action="<?=url_global?>/producto" method="post">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="form-outline">
                        <textarea class="form-control" name="motivo" id="textAreaExample" rows="4" onkeyup="Mayus(this);vedescar(this)"></textarea>
                        <label class="form-label" for="textAreaExample">Motivo</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <hr>
            </div>
            <div class="row">
                <div class="col-12">
                    <div style="width:200px">
                        <center>
                                <button type="submit" class="btn btn-text bg-base-color btn-descar btn-block" title="Descartar">
                                    <i class="fa-regular fa-circle-check"></i> Descartar
                                </button>
                                <input type="hidden" name="codigo" value="<?=$codigo?>">
                        </center>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/producto.js"></script>
<?php include("public/views/assets/footer.php") ?>