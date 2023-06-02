<?php

class CategoriaController{

    public function __construct(){
        $this->categoria = new CategoriaModel;
    }
        
    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Lista de Categorías";
            $data = $this->categoria->mostrar();
            include("public/views/categorias/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function agregar(){
        $data = array('nombre' => trim($_POST['nombre']));
        $result = $this->categoria->agregar($data);
        if(!$result)
            echo "Categoría agregada exitosamente";
        else
            echo "Error";
    }

    public function editar(){
        if(isset($_SESSION['session'])):
            $data = [];
            $id = $_POST['id'];
            $result = $this->categoria->editar($id);

            $data['id'] = $result->id;
            $data['nombre'] = $result->nombre;

            echo json_encode($data);

        else:
            header('Location:'.url_global);
        endif;
    }

    public function actualizar(){
        $data = array("nombre" => trim($_POST['ecategoria']));
        $id = $_POST['id'];

        $result = $this->categoria->actualizar($data, $id);
        if(!$result)
            echo "Datos actualizado exitosamente";
        else
            echo "Error";
    }

    public function eliminar(){
        $id = $_POST['id'];
        $result = $this->categoria->eliminar($id);
        if(!$result)
            echo "true";
        else
            echo "false";

    }

}

?>