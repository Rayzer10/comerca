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
    <div id="textExample1" class="form-text text-danger msg_campos"></div>
    <form action="<?=url_global?>/usuarios/agregar" method="POST" class="form">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline">
                    <input type="text" id="form6Example1" class="form-control" name="rif" maxlength="20" onkeyup="verify_prove()"/>
                    <label class="form-label" for="form6Example1">RIF</label>
                </div>
                <div id="textExample1" class="form-text text-danger proveedor-unique"></div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-outline">
                <input type="text" id="form6Example2" class="form-control" name="nombre" maxlength="20" onkeyup="verify_prove();Mayus(this)"/>
                    <label class="form-label" for="form6Example2">Nombre</label>
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="form6Example3" class="form-control" name="telefono" maxlength="11" onkeypress=
                  "return soloNumeros(event)" onkeyup="verify_prove()"/>
            <label class="form-label" for="form6Example3">Teléfono</label>
        </div>
        
        <!-- Submit button -->
        <div style="margin:auto;width:200px">
            <center>
                <button type="submit" class="btn btn-text bg-base-color btn-block mb-4 agregar" title="Agregar Proveedor">
                    <i class="fa-solid fa-plus"></i> Agregar Proveedor
                </button>
            </center>
        </div>
    </form>
</main>

<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/helpers.js"></script>
<script src="<?=url_global?>/public/recursos/js/proveedor.js"></script>
<?php include("public/views/assets/footer.php") ?>