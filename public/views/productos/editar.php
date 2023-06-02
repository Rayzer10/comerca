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
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/usuarios/agregar" method="POST" class="form">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <select class="select" name="categoria" onchange="verify_prode()">
                    <option value="" selected disabled>Seleccione una categoría</option>
                    <?php 
                        foreach($cat as $categoria):
                            ($categoria->nombre == $data->categoria) ? $selected = "selected" : $selected = "";
                            ($categoria->nombre == $data->categoria) ? $disabled = "disabled" : $disabled = "";
                    ?>
                        <option value="<?=$categoria->id?>" <?= $selected ?> <?= $disabled ?>><?=strtoupper($categoria->nombre)?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Categoría</label>
            </div>
            <div class="col-lg-6 col-sm-12">
                <select class="select" name="marca" onchange="verify_prode()">
                    <option value="" selected disabled>Seleccione una marca</option>
                    <?php 
                        foreach($mar as $marca): 
                            ($marca->nombre == $data->marca) ? $selected = "selected" : $selected = "";
                            ($marca->nombre == $data->marca) ? $disabled = "disabled" : $disabled = "";
                    ?>
                        <option value="<?=$marca->id?>" <?= $selected ?> <?= $disabled ?>><?=strtoupper($marca->nombre)?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Marca</label>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example1" class="form-control" name="codigo" value="<?= ucfirst($data->codigo) ?>" maxlength="20" onkeyup="verify_prode()"/>
                <label class="form-label" for="form6Example1">Código</label>
            </div>
            </div>
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example2" class="form-control" name="nombre" value="<?= ucfirst($data->nombre) ?>" maxlength="20" onkeyup="Mayus(this);verify_prode()"/>
                <label class="form-label" for="form6Example2">Nombre</label>
            </div>
            </div>
        </div>
        <!-- <div class="row mb-4">
            <div class="col-lg-4 col-sm-12">
                <div class="form-outline datepicker-translated" data-mdb-format="yyyy/mm/dd" >
                    <input type="text" class="form-control" name="fecha" value="<?= ucfirst($data->fecha) ?>" id="exampleDatepicker3" data-mdb-toggle="datepicker" onblur="verify_prode()">
                    <label for="exampleDatepicker3" class="form-label">Fecha</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="form-outline datepicker-v" data-mdb-format="yyyy/mm/dd" >
                    <input type="text" class="form-control" name="fecha_vencimiento" value="<?= ucfirst($data->fecha_vencimiento) ?>" id="exampleDatepicker3" data-mdb-toggle="datepicker" onblur="verify_prode()">
                    <label for="exampleDatepicker3" class="form-label">Fecha de Vencimiento</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example3" class="form-control" name="cantidad" value="<?= $data->cantidad ?>" maxlength="2" onkeypress=
                    "return soloNumeros(event)" onkeyup="verify_prode()"/>
                    <label class="form-label" for="form6Example3">Cantidad</label>
                </div>
            </div>
        </div> -->
        <!-- Submit button -->
        <div style="margin:auto;width:200px">
            <center>
                <button type="submit" class="btn btn-text bg-base-color btn-block mb-4 actualizar" title="Actualizar Cambios">
                    <i class="fa-regular fa-circle-check"></i> Actualizar Cambios
                </button>
                <input type="hidden" name="codigo_hidden" value="<?=$data->codigo?>">
            </center>
        </div>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/producto.js"></script>
<?php include("public/views/assets/footer.php") ?>