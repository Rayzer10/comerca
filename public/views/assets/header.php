<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/MDBootstrap-5_pro/css/mdb.min.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/css/estilos.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/css/estilos_menu.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/DataTables/Responsive-2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="<?=url_global?>/public/recursos/fontawesome-free-6.3.0/css/all.min.css">
</head>
<body>
    <div class="contenedor">
        <div class="sidebar">
            <?php include("menu.php") ?>
        </div>
        <div class="navbars">
        <?php include("navbar.php") ?>
        </div>
        <div class="body">
