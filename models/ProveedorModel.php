<?php

    class ProveedorModel extends Conection{

        public function mostrar(){
            try{
                $sql = "SELECT * FROM proveedor ORDER BY nombre";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar la lista: " . $e->getMessage();
            }
        }

        public function agregar($datos){
            try{
                $sql = $this->insert($datos, "proveedor");
                $arraySinClaves = array_values($datos);
                $stmt = $this->db->prepare($sql);
                $stmt->execute($arraySinClaves);
                $this->historial("agregó nuevo proveedor");
            } catch(PDOException $e){
                echo "Error al agregar el registro: " . $e->getMessage();
            }
        }

        public function perfil($rif){
            try {
                $sql = "SELECT * FROM proveedor WHERE rif = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$rif]);
                return $result = $stmt->fetch(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar el valor específico: " . $e->getMessage();
            }
        }

        public function actualizar($data, $rif){
            try{
                $n = 1;
                $sql = "UPDATE proveedor set ";
                foreach($data as $columns => $valores){
                    $sql.= $columns." = ?, ";
                }
                $sql = rtrim($sql, ", ");
                $sql.= " WHERE rif = ?";
                $stmt = $this->db->prepare($sql);
                $arraySinClaves = array_values($data);
                $stmt->execute(array_merge($arraySinClaves, [$rif]));
                $this->historial("actualizó datos del proveedor");
            } catch(PDOException $e){
                echo "Error al actualizar: " . $e->getMessage();
            }
        }

        public function eliminar($rif){
            try {
                $sql = "DELETE FROM proveedor WHERE rif = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$rif]);
                $this->historial("Eliminó un proveedor");
            } catch(PDOException $e){
                echo "Error al eliminar: " . $e->getMessage();
            }

        }

    }

?>