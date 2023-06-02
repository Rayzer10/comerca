<?php include("public/views/assets/header.php") ?>
<style>
    .form-comp {
        display: flex;
        align-items: center;
    }
    .form-comp > div:nth-child(1){
        margin-right: 10px;
    }
</style>
<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <!-- <a href="<?=url_global?>/usuarios/formulario" class="btn btn-floating btn-lg bg-base-color" title="Agregar Nuevo Usuario">
            <i class="fa-solid fa-user-plus"></i></a> -->
        </div>
    </div>
    <div class="form-comp">
        <div>
            <div class="form-outline">
                <input type="text" id="form6Example1" class="form-control" name="nombre" maxlength="25" onkeyup="validara(this);Mayus(this);" onkeypress="return soloLetras(event)"/>
                <label class="form-label" for="form6Example1">Nueva Marca</label>
            </div>
        </div>
        <div>
            <button class="btn btn-floating bg-base-color agregar" title="Agregar Marca"><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>
    <div id="textExample1" class="form-text text-danger marca-unique"></div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Marca</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1; ?>
            <?php foreach($data as $rows): ?>
                <tr>
                    <td><?= $num ?></td>
                    <td><?= $rows->nombre ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn bg-base-color" title="Editar"
                            data-mdb-toggle="modal" onclick="editar(<?=$rows->id?>)" data-mdb-target="#staticBackdrop">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-delete" onclick="eliminar(<?=$rows->id?>)" title="Eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php $num++ ?>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th>N°</th>
                <th>Marca</th>
                <th>Opciones</th>
            </tr>
        </tfoot>
    </table>
    <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><b>Editar</b></h5>
                <button type="button" class="btn-close reloaded" data-mdb-dismiss="modal" aria-label="Close" onclick=""></button>
            </div>
            <div class="modal-body">
                <div class="form-outline mb-2">
                    <input type="text" id="form6Example2" class="form-control" name="emarca" maxlength="25" onkeyup="validare(this);Mayus(this);" onkeypress="return soloLetras(event)" onkeyup=""/>
                 <label class="form-label" for="form6Example2">Categoría</label>
                 <input type="hidden" name="id">
                </div>
                <div class="error-venta text-danger"></div>
                <div class="result-venta text-success"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger reloaded" data-mdb-dismiss="modal" onclick="" title="Cerrar">Cerrar</button>
                <button type="button" class="btn btn-primary actualizar" title="Guardar">Guardar</button>
            </div>
            </div>
        </div>
    </div>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/marca.js"></script>
<?php include("public/views/assets/footer.php") ?>