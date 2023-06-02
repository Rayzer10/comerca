<?php

class LoginController{

    public function __construct(){
        $this->login = new LoginModel;
    }
        
    public function index(){
        if(isset($_SESSION['session'])):
            header("Location: tablero");
        else:
            $titulo = "Inicio de Sesión";
            /* $sql = "SELECT * FROM comentarios"; 
            $result = $this->db->query($sql);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo "Inicio Sesión ".$row['usuario']; */
            include("public/views/login/index.php");
        endif;
    }

    public function login(){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $this->login->login($user, $pass);
    }

    public function logout(){
        if(isset($_SESSION['session'])){
            session_destroy();
            header('location:'.url_global);
        }
    }

}

?>