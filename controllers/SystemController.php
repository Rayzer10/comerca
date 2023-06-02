<?php

    include('models/ProductoModel.php');

    class SystemController{

        public function __construct(){
            $this->system = new ProductoModel;
        }

        public function unique(){
            try{
                $boolean = [];
                $sql = "SELECT * FROM {$_POST['tabla']} WHERE {$_POST['campo']} = ?";
                $verify = $this->system->consulta($sql);
                $verify->execute([$_POST['dato']]);
                if($verify->rowCount() == 1)
                    $boolean['verify'] = true;
                else
                    $boolean['verify'] = false;
                echo json_encode($boolean);

            } catch(PDOexception $e){
                "Error: " . $e->getMessage();
            }
        }
    }

?>