<?php

class ProveedorController{

    public function __construct(){
        $this->proveedor = new ProveedorModel;
    }

    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Lista de Proveedores";
            $data = $this->proveedor->mostrar();
            include("public/views/proveedores/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function formulario(){
        if(isset($_SESSION['session'])):
            $titulo = "Agregar Proveedor";
            include("public/views/proveedores/agregar.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function agregar(){
        $data = array(
            'rif' => trim(strtolower($_POST['rif'])),
            'nombre' => trim($_POST['nombre']),
            'telefono' => $_POST['telefono'],
        );
        $result = $this->proveedor->agregar($data);
        if(!$result)
            echo "Proveedor registrado exitosamente";
        else
            echo "Error";
    }

    public function perfil(){
        if(isset($_SESSION['session'])):
            $rif = explode("?rif=", paramers);
            $rif = end($rif);
            /* var_dump($rif);
            exit(); */
            $titulo = "Perfil Proveedor";
            (!empty(base64_decode(urldecode($rif)))) ? $data = $this->proveedor->perfil(base64_decode(urldecode($rif))) : header("location:".url_global."/proveedor");
            if($data != false):
                include("public/views/proveedores/perfil.php");
            else:
                header("location:".url_global."/proveedor");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function editar(){
        if(isset($_SESSION['session'])):
            $rif = explode("?rif=", paramers);
            $rif = end($rif);
            $rif = urldecode($rif);
            $titulo = "Editar Proveedor";
            (!empty(base64_decode(urldecode($rif)))) ? $data = $this->proveedor->perfil(base64_decode(urldecode($rif))) : header("location:".url_global."/proveedor");
            if($data != false):
                include("public/views/proveedores/editar.php");
            else:
                header("location:".url_global."/proveedor");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function actualizar(){
        $data = array(
            'rif' => trim(strtolower($_POST['rif'])),
            'nombre' => trim($_POST['nombre']),
            'telefono' => $_POST['telefono'],
        );
        $rif = $_POST['rif_hidden'];
        $result = $this->proveedor->actualizar($data, $rif);
        if(!$result)
            echo "Datos actualizado exitosamente";
        else
            echo "Error";
    }

    public function eliminar(){
        $rif = $_POST['rif'];
        /* var_dump($rif);
        exit(); */
        $result = $this->proveedor->eliminar($rif);
        if(!$result)
            echo "true";
        else
            echo "false";
    }

}

?>