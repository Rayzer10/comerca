<?php

include('models/ProductoModel.php');
include('models/UsuariosModel.php');

class TableroController{

    public function __construct(){
        $this->tablero = new TableroModel;
        $this->productos = new ProductoModel;
        $this->usuarios = new UsuariosModel;
    }
        
    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Tablero";

            $des = 0;
            $pro = 0;
            $usu = 0;

            $des = $this->productos->descartados();
            $pro = $this->productos->mostrar();
            $usu = $this->usuarios->mostrar();
            $data = $this->tablero->mostrar();
            include("public/views/home/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

}

?>