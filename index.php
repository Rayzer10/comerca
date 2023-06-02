<?php

     //PERMITE DETERMINA EL HORARIO DE FORMA EXACTA DEPENDIENDO DEL CONTINENTE/PAÍS QUE SE COLOQUE 
     date_default_timezone_set('America/Caracas');

     //ACTIVA LAS VARIABLES DE SESIÓN EN TODO EL SISTEMA 
     session_start();

    $URI = explode("/", $_SERVER['REQUEST_URI']);

    if(!empty($URI[3]))
        define("paramers", $URI[3]);

    //SE OBTIENE EL NOMBRE DE LA CARPETA DEL SISTEMA
    define("url_global", $URI[0]."/".$URI[1]);

    //SE OBTIENE EL VALOR PROVENIENTE DE LA VARIABLE URL DEFINIDA EN EL HTACCESS
    empty($_GET['url']) ? $url = "" : $url = $_GET['url'];
    $split = explode("/", $url);

    require 'system/Conection.php';
    require_once('system/Autoload.php');
    new Autoload;

    if($url==""){
        $class = new LoginController;
        call_user_func([$class, "index"]);
    }else{
        $controlador = ucfirst($split[0]);
        empty($split[1]) ? $funcion = "index" : $funcion = strtolower($split[1]);
        $object = $controlador."Controller";
        $class = new $object;
        (is_callable([$class, $funcion])) ? call_user_func([$class, $funcion]) : header('location:'.url_global);
    }

?>