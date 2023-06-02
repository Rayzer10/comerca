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
        <div class="mb-4">
            <select class="select" name="rif" onchange="rif_prov()">
                <option value="" selected disabled>Seleccione un proveedor</option>
                <?php foreach($pro as $prov): ?>
                    <option value="<?=$prov->rif?>"><?=strtoupper($prov->rif)?> - <?=strtoupper($prov->nombre)?></option>
                <?php endforeach ?>
            </select>
            <label class="form-label select-label">Rif Proveedor</label>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <select class="select" name="categoria" onchange="verify_prod()">
                    <option value="" selected disabled>Seleccione una categoría</option>
                    <?php foreach($cat as $categoria): ?>
                        <option value="<?=$categoria->id?>"><?=strtoupper($categoria->nombre)?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Categoría</label>
            </div>
            <div class="col-lg-6 col-sm-12">
                <select class="select" name="marca" onchange="verify_prod()">
                    <option value="" selected disabled>Seleccione una marca</option>
                    <?php foreach($mar as $marca): ?>
                        <option value="<?=$marca->id?>"><?=strtoupper($marca->nombre)?></option>
                    <?php endforeach ?>
                </select>
                <label class="form-label select-label">Marca</label>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example1" class="form-control" name="codigo" maxlength="20" onkeyup="verify_prod()"/>
                <label class="form-label" for="form6Example1">Código</label>
            </div>
            <div id="textExample1" class="form-text text-danger productos-unique"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
            <div class="form-outline">
                <input type="text" id="form6Example2" class="form-control" name="nombre" maxlength="20" onkeyup="Mayus(this);verify_prod()"/>
                <label class="form-label" for="form6Example2">Nombre</label>
            </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-12">
                <div class="form-outline datepicker-translated" data-mdb-format="yyyy/mm/dd" >
                    <input type="text" class="form-control" name="fecha" id="exampleDatepicker3" data-mdb-toggle="datepicker" onblur="verify_prod()">
                    <label for="exampleDatepicker3" class="form-label">Fecha</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="form-outline datepicker-v" data-mdb-format="yyyy/mm/dd" >
                    <input type="text" class="form-control" name="fecha_vencimiento" id="exampleDatepicker3" data-mdb-toggle="datepicker" onblur="verify_prod()">
                    <label for="exampleDatepicker3" class="form-label">Fecha de Vencimiento</label>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example3" class="form-control" name="cantidad" maxlength="2" onkeypress=
                    "return soloNumeros(event)" onkeyup="verify_prod()"/>
                    <label class="form-label" for="form6Example3">Cantidad</label>
                </div>
            </div>
        </div>
        <!-- Submit button -->
        <div style="margin:auto;width:200px">
            <center>
                <button type="submit" class="btn btn-text bg-base-color btn-block mb-4 agregar" title="Agregar Producto">
                    <i class="fa-solid fa-plus"></i> Agregar Producto
                </button>
            </center>
        </div>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/producto.js"></script>
<?php include("public/views/assets/footer.php") ?>