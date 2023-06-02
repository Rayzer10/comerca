<?php

class MarcaController{

    public function __construct(){
        $this->marca = new MarcaModel;
    }
        
    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Lista de Marcas";
            $data = $this->marca->mostrar();
            include("public/views/marcas/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function agregar(){
        $data = array('nombre' => trim($_POST['nombre']));
        $result = $this->marca->agregar($data);
        if(!$result)
            echo "Marca agregada exitosamente";
        else
            echo "Error";
    }

    public function editar(){
        if(isset($_SESSION['session'])):
            $data = [];
            $id = $_POST['id'];
            $result = $this->marca->editar($id);

            $data['id'] = $result->id;
            $data['nombre'] = $result->nombre;

            echo json_encode($data);

        else:
            header('location:'.url_global);
        endif;
    }

    public function actualizar(){     
        $data = array("nombre" => trim($_POST['emarca']));
        $id = $_POST['id'];

        $result = $this->marca->actualizar($data, $id);
        if(!$result)
            echo "Datos actualizado exitosamente";
        else
            echo "Error";
    }

    public function eliminar(){
        $id = $_POST['id'];
        $result = $this->marca->eliminar($id);
        if(!$result)
            echo "true";
        else
            echo "false";

    }

}

?>