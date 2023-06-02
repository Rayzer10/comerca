<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/MDBootstrap-5_pro/css/mdb.min.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/css/estilos.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/alertifyjs/css/alertify.min.css"/>
</head>
<body>
<main class="login">
    <div class="contenedor_login">
        <div class="logo_login">
            <img src="<?= url_global ?>/public/recursos/imagenes/logo_login.png" alt="" srcset="">
        </div>
        <!-- <center>
            <h2><b>Inicio de Sesión</b></h2>
        </center> -->
        <div class="form_login">
            <form action="Login/login" method="POST" class="form">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form1Example1" class="form-control" name="username"/>
                    <label class="form-label" for="form1Example1">Usuario</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form1Example2" class="form-control" name="password"/>
                    <label class="form-label" for="form1Example2">Contraseña</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <!-- <div class="col d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Recuerda me </label>
                        </div>
                    </div> -->

                    <div class="col d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="#!">¿Olvido su contraseña?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn bg-base-color btn-rounded btn-block boton-login">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</main> 
<script src="<?=url_global?>/public/recursos/js/jquery.js"></script>
<script src="<?=url_global?>/public/recursos/js/login.js"></script>
<script src="<?=url_global?>/public/recursos/MDBootstrap-5_pro/js/mdb.min.js"></script>
<script src="<?=url_global?>/public/recursos/alertifyjs/alertify.min.js"></script>
<script>
    //Alertify theme boostrap
    alertify.defaults.transition = "slide";
    alertify.defaults.theme.ok = "btn btn-primary";
    alertify.defaults.theme.cancel = "btn btn-danger";
    alertify.defaults.theme.input = "form-control";
</script>
</body>
</html>