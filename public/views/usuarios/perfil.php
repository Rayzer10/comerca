<?php include("public/views/assets/header.php") ?>

<main class="body_data">
    <div class="options">
        <div class="titulo">
            <?= $titulo ?>
        </div>
        <div class="action">
            <?php if($_SESSION['rol'] == 1): ?>
                <a href="<?=url_global?>/usuarios" class="btn btn-warning btn-lg btn-floating" title="Atrás">
                    <i class="fa-regular fa-circle-left"></i>
                </a>
            <?php endif ?>
        </div>
    </div>
    <div class="perfil">
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Nombre</div>
                <?= $data->nombre ?> <?= $data->apellido ?>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div style="font-weight:bold">Cédula</div>
                <?= $data->ci ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Nombre de Usuario</div>
                <?= $data->username ?>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Rol</div>
                <?php ($data->rol == "1") ? $rol = "Administrador" : $rol = "Operador"; ?>
                <?= $rol ?>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div style="font-weight:bold">Estado</div>
                <?php 
                    if($data->estado == 1){
                        $estado = "Activo";
                        $class="text-success";
                    }else {
                        $estado = "Inactivo";
                        $class="text-danger";
                    }
                ?>
                <span class="<?=$class?>"><?= $estado ?></span>
            </div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?=url_global?>/usuarios/editar" method="GET" style="display:initial">
                    <button type="submit" class="btn btn-text bg-base-color" title="Editar">
                        <i class="fa-solid fa-user-pen"></i> Editar
                    </button>
                    <input type="hidden" name="ci" value="<?=$ci?>">
                </form>
                <?php 
                    if($data->estado == 1){
                        $estado = "Desactivar";
                        $background = "btn-danger";
                        $ico = "fa-xmark";
                    }else{
                        $estado = "Activar";
                        $background = "btn-success";
                        $ico = "fa-check";
                    }
                ?>
                <?php if($data->ci!=$_SESSION['ci']): ?>
                    <button type="submit" class="btn btn-text <?=$background?> btn-estado" title="<?=$estado?>">
                        <i class="fa-solid <?=$ico?> fa-lg"></i> <?=$estado?>
                    </button>
                    <input type="hidden" name="cod_resistro" value="<?=$data->estado?>">
                    <input type="hidden" name="cedula" value="<?=$data->ci?>">
                <?php endif ?>
            </div>
        </div>
    </div>
</main>
<?php include("public/views/assets/scripts.php") ?>
<script src="<?=url_global?>/public/recursos/js/usuarios.js"></script>
<?php include("public/views/assets/footer.php") ?>