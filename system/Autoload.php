<?php
    class Autoload{

        public function __construct(){
            spl_autoload_register(function($class_name){
                /* echo var_dump($class_name); */
                $controller_patch = 'controllers/'.$class_name.'.php';
                $model_patch = 'models/'.$class_name.'.php';
                if(is_file($controller_patch)){
                    require_once($controller_patch);
                    /* echo "<p>$controller_patch</p>"; */
                }
                if(is_file($model_patch)){
                    require_once($model_patch);
                    /* echo "<p>$model_patch</p>"; */
                }
            });
        }

    }

?>