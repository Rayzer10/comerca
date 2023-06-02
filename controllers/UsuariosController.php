<?php

class UsuariosController{

    public function __construct(){
        $this->usuarios = new UsuariosModel;
    }
        
    public function index(){
        if(isset($_SESSION['session']) && $_SESSION['rol'] == 1):
            $titulo = "Lista de Usuarios";
            $data = $this->usuarios->mostrar();
            include("public/views/usuarios/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function formulario(){
        if(isset($_SESSION['session']) && $_SESSION['rol'] == 1):
            $titulo = "Agregar Nuevo Usuario";
            include("public/views/usuarios/agregar.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function agregar(){
        $data = array(
            'ci' => trim($_POST['ci']),
            'nombre' => trim($_POST['nombre']),
            'apellido' => trim($_POST['apellido']),
            'username' => trim($_POST['username']),
            'password' => md5($_POST['password']),
            'rol' => $_POST['rol']
        );
        $result = $this->usuarios->agregar($data);
        if(!$result)
            echo "Usuario registrado exitosamente";
        else
            echo "Error";
    }

    public function perfil(){
        $ci = explode("?ci=", paramers);
        $ci = end($ci);
        if(isset($_SESSION['session'])):
            $titulo = "Perfil Usuario";
            (!empty(base64_decode(urldecode($ci)))) ? $data = $this->usuarios->perfil(base64_decode(urldecode($ci))) : header("location:".url_global."/usuarios");
            if($data != false):
                include("public/views/usuarios/perfil.php");
            else:
                header("location:".url_global."/usuarios");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function editar(){
        if(isset($_SESSION['session']) && $_SESSION['rol'] == 1):
            $ci = explode("?ci=", paramers);
            $ci = end($ci);
            $ci = urldecode($ci);
            $titulo = "Editar Usuario";
            (!empty(base64_decode(urldecode($ci)))) ? $data = $this->usuarios->perfil(base64_decode(urldecode($ci))) : header("location:".url_global."/usuarios");
            if($data != false):
                include("public/views/usuarios/editar.php");
            else:
                header("location:".url_global."/usuarios");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function actualizar(){
        $data = [];

        $data = [
            'ci' => trim($_POST['ci']),
            'nombre' => trim($_POST['nombre']),
            'apellido' => trim($_POST['apellido']),
            'username' => trim($_POST['username']),
        ];

        if(isset($_POST['rol']))
            $data['rol'] = $_POST['rol'];

        if(isset($_POST['password']))
            $data['password'] = md5($_POST['password']);

        $cedula = $_POST['ci_hidden'];
        $result = $this->usuarios->actualizar($data, $cedula);
        if(!$result)
            echo "Datos del usuario actualizado exitosamente";
        else
            echo "Error";
    }

    public function estado(){
        $estado = $_POST['estado'];
        $ci = $_POST['ci'];
        ($estado == 1) ? $estado = 0 : $estado = 1;
        $result = $this->usuarios->estado($ci, $estado);
        if(!$result)
            echo "true";
        else
            echo "false";

    }

}

?>