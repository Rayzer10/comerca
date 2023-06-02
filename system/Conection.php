<?php

    class Conection{

        protected $host = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "comerca";
        protected $db;

        public function __construct(){
            try{
                $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }

        public function insert($valores, $tabla){
            $column = "";
            $values = "";
            $sql = "INSERT INTO ".$tabla." (";
            foreach($valores as $columnas => $v){
                $column.= $columnas.", ";
            }
            $sql.= rtrim($column, ", ");
            $sql.= ") VALUES ("; 
            foreach($valores as $datos){
                $values.= "?, ";
            }
            $sql.= rtrim($values, ", ");
            $sql.= ");";
            return $sql;
        }

        public function historial($accion){
            try{
                $sql = "INSERT INTO historial VAlUES (?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute(['DEFAULT', $accion, date("Y-m-d"), $_SESSION['ci']]);
            } catch(PDOException $e){
                echo "Erro en el historial: ".$e->getMessage();
            }
        }

    }

?>