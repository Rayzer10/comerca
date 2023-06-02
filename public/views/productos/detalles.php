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
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Categoría</div>
                <?= strtoupper($data->categoria) ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Marca</div>
                <?= strtoupper($data->marca) ?>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Fecha Ingreso</div>
                <?= strtoupper($data->fecha) ?>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Fecha Vencimiento</div>
                <?= $data->fecha_vencimiento ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Cantidad</div>
                <?= $data->cantidad ?>
            </div>
            <?php if($data->vendido!=""): ?>
                <div class="col-lg-4 col-sm-12">
                    <div style="font-weight:bold">Vendido</div>
                    <?= $data->vendido ?>
                </div>
            <?php endif ?>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <form action="<?=url_global?>/producto/editar" method="GET" style="display:initial">
                    <button type="submit" class="btn btn-lg btn-floating bg-base-color" title="Editar">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <input type="hidden" name="codigo" value="<?=$codigo?>">
                </form>
                <button type="submit" class="btn btn-danger btn-floating btn-lg btn-delete" title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                </button>
                <input type="hidden" name="codigo_delete" value="<?=$data->codigo?>">
            </div>
            <?php if($data->stock > 0 || is_null($data->stock)): ?>
            <div class="col-lg-6 col-sm-12" style="display:flex; justify-content:flex-end">
                <button type="submit" class="btn btn-secondary btn-floating btn-lg" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop" title="Vender">
                    <i class="fa-solid fa-minus"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><b>Cantidad Vendida</b></h5>
                            <button type="button" class="btn-close reloaded" data-mdb-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-outline mb-2">
                                <input type="text" id="form6Example1" class="form-control" name="vendidos" maxlength="2" onkeypress="return soloNumeros(event)" onkeyup=""/>
                            <!--  <label class="form-label" for="form6Example1">Vendidos</label> -->
                            </div>
                            <div class="error-venta text-danger"></div>
                            <div class="result-venta text-success"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger reloaded" data-mdb-dismiss="modal" onclick="window.location.reload();">Cerrar</button>
                            <button type="button" class="btn btn-primary btn-vendidos">Guardar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</main>
<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/producto.js"></script>
<?php include("public/views/assets/footer.php") ?>