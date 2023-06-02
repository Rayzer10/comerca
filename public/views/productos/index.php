<?php include("public/views/assets/header.php") ?>

<style>
    .grid-tabla{
        text-align: center;
    }
    .titulov {
        font-weight: bold;
        margin-top: 15px;
        font-size: 18px;
        text-align: center;
    }
    .modal-body {
        max-height: 300px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .modal-footer{
        justify-content: space-between;
    }
</style>
<!-- <i class="fa-solid fa-xmark"></i> -->
<main class="body_data">
    <div class="mb-4">
         <div>
            <a href="<?=url_global?>/producto/masvendidos" class="btn btn-rounded btn-danger btn-pdf" target="_blank" title="Más Vendidos">
                <i class="fa-solid fa-file-pdf"></i>
                Más Vendidos
            </a>
            <a href="<?=url_global?>/producto/menosvendidos" class="btn btn-rounded btn-danger btn-pdf" target="_blank" title="Menos Vendidos">
                <i class="fa-solid fa-file-pdf"></i>
                Menos Vendidos
            </a>
            <a href="<?=url_global?>/producto/pocostock" class="btn btn-rounded btn-danger btn-pdf" target="_blank" title="Stock Mínimo">
                <i class="fa-solid fa-file-pdf"></i>
                Stock mínimo
            </a>
        </div>
    </div>
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <a href="<?=url_global?>/producto/formulario" class="btn btn-text bg-base-color" title="Nuevo Producto">
                <i class="fa-solid fa-plus"></i> Nuevo Producto
            </a>
        </div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Fecha V.</th>
                <th>Proveedor</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="productos_filtro">
            <?php foreach($data as $rows): ?>
                <tr>
                    <td>
                        <a href="#" onclick="details('<?= $rows->codigo ?>')" data-mdb-toggle="modal" data-mdb-target="#details<?= $rows->codigo ?>">
                            <?= $rows->codigo ?>
                        </a>
                    </td>
                    <td><?= $rows->nombre ?></td>
                    <td><?= $rows->fecha_vencimiento ?></td>
                    <td><?= $rows->nombre_proveedor ?></td>
                    <?php
                        if(is_null($rows->estado) || $rows->estado > 0)
                            $estado = "<span class='text-success'>Almacén</span>";
                        else if($rows->estado == 0)
                            $estado = "<span class='text-danger'>Vendido</span>";
                    ?>
                    <td> <?= $estado ?> </td>
                    <td>
                        <?php if($rows->timeout <= 0 && $rows->estado != 0): ?>
                            <a href="<?=url_global?>/producto/descartar?codigo=<?= base64_encode(urlencode($rows->codigo)) ?>" class="btn btn-secondary btn-text"><i class="fa-solid fa-xmark"></i> Descartar</a>
                        <?php else: ?>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php if($rows->estado > 0 || is_null($rows->estado)): ?>
                                <button type="button" class="btn" style="background-color:#F1753F;color:#ffffff" onclick="" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop<?=$rows->codigo?>" title="Vender">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop<?=$rows->codigo?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel"><b>Cantidad a Vender</b></h5>
                                            <button type="button" class="btn-close reloaded" data-mdb-dismiss="modal" aria-label="Close" onclick="window.location.reload();"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-outline mb-2">
                                                <input type="text" id="form6Example1" class="form-control" name="vendidos<?=$rows->codigo?>" onkeyup="validar([this, '<?=$rows->codigo?>'])" maxlength="2" onkeypress="return soloNumeros(event)" onkeyup=""/>
                                                <input type="hidden" name="nombre<?=$rows->codigo?>" value="<?= $rows->nombre ?>">
                                            <!--  <label class="form-label" for="form6Example1">Vendidos</label> -->
                                            </div>
                                            <div class="error-venta<?=$rows->codigo?> text-danger"></div>
                                            <div class="result-venta<?=$rows->codigo?> text-success"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger reloaded" data-mdb-dismiss="modal" onclick="window.location.reload();" title="Cerrar">Cerrar</button>
                                            <button type="button" class="btn btn-primary btn-vendidos" data-codigo="<?=$rows->codigo?>"" onclick="sale('<?=$rows->codigo?>')" title="Guardar">Guardar</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="<?=url_global?>/producto/editar" method="GET" style="display:initial">
                                    <button type="submit" class="btn bg-base-color" style="border-radius: 0px;" title="Editar"
                                    data-mdb-toggle="modal" onclick="" data-mdb-target="#staticBackdrop">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <input type="hidden" name="codigo" value="<?=base64_encode($rows->codigo)?>">
                                </form>
                            <?php else: ?>
                                <button type="button" class="btn" title="Vender" disabled>
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                                <button type="button" class="btn" title="Editar" disabled>
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                            <?php endif ?>
                            <button type="button" class="btn btn-danger btn-delete" onclick="eliminar('<?=$rows->codigo?>')" title="Eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                        <?php endif ?>
                    </td>
                </tr>
                <!-- Modal Detalles -->
                <div class="modal fade" id="details<?=$rows->codigo?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><b>Detalles</b></h5>
                            <button type="button" class="btn-close reloaded" data-mdb-dismiss="modal" aria-label="Close" onclick=""></button>
                        </div>
                        <div class="modal-body">
                            <div class="grid-tabla">
                                <div class="row mb-1">
                                    <div class="col col-md-4"><b>Fecha</b></div>
                                    <div class="col col-md-4"><b>Cantidad</b></div>
                                    <div class="col col-md-4"><b>Vendidos</b></div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-4"><?= $rows->fecha ?></div>
                                    <div class="col col-md-4"><?= $rows->stock ?></div>
                                    <?php if(!is_null($rows->estado)): ?>
                                        <div class="col col-md-4"><?= $rows->vendidos ?></div>
                                    <?php else: ?>
                                        <div class="col col-md-4">N/A</div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <?php if(!is_null($rows->estado)): ?>
                                <div class="titulov">Historial de ventas</div>
                                <div class="detailsresp<?=$rows->codigo?>" style="text-align:center"></div>
                            <?php endif ?>
                        </div>
                        <div class="modal-footer">
                            <a href="<?=url_global?>/producto/descartar?codigo=<?= base64_encode(urlencode($rows->codigo)) ?>" class="btn btn-secondary" title="Descartar">Descartar</a>
                            <button type="button" class="btn btn-danger reloaded" data-mdb-dismiss="modal" onclick="" title="Cerrar">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Fecha V.</th>
                <th>Proveedor</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/producto.js"></script>
<?php include("public/views/assets/footer.php") ?>