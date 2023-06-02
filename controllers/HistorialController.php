<?php

class HistorialController{

    public function __construct(){
        $this->historial = new HistorialModel;
    }
        
    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Historial";
            /* $sql = "SELECT * FROM comentarios"; 
            $result = $this->db->query($sql);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo "Inicio Sesión ".$row['usuario']; */
            $data = $this->historial->mostrar();
            ($data) ? $data : $data = "No hay datos para mostrar";
            include("public/views/historial/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function reporte(){
        if(isset($_SESSION['session'])):
            $data = $this->historial->mostrar();
            ($data) ? $data : $data = "No hay datos para mostrar";
            include('public/recursos/reportes/examples/historial.php');
        else:
            header('Location:'.url_global);
        endif;
    }

}

?>