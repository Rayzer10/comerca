<?php

    class CategoriaModel extends Conection{

        public function mostrar(){
            try{
                $sql = "SELECT * FROM categoria ORDER BY nombre";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar la lista: " . $e->getMessage();
            }
        }

        public function agregar($datos){
            try{
                $sql = $this->insert($datos, "categoria");
                $arraySinClaves = array_values($datos);
                $stmt = $this->db->prepare($sql);
                $stmt->execute($arraySinClaves);
                $this->historial("agregó nuevo categoría");
            } catch(PDOException $e){
                echo "Error al agregar el registro: " . $e->getMessage();
            }
        }

        public function editar($id){
            try {
                $sql = "SELECT * FROM categoria WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id]);
                return $result = $stmt->fetch(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar el valor específico: " . $e->getMessage();
            }
        }

        public function actualizar($data, $id){
            try{
                $n = 1;
                $sql = "UPDATE categoria set ";
                foreach($data as $columns => $valores){
                    $sql.= $columns." = ?, ";
                }
                $sql = rtrim($sql, ", ");
                $sql.= " WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $arraySinClaves = array_values($data);
                $stmt->execute(array_merge($arraySinClaves, [$id]));
                $this->historial("actualizó una categoría");
            } catch(PDOException $e){
                echo "Error al actualizar: " . $e->getMessage();
            }    
        }

        public function eliminar($id){
            try{
                $sql = "DELETE FROM categoria WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$id]);
                $this->historial("Eliminó una categoría");
            }catch(PDOexception $e){
                echo "Error al eliminar: " . $e->getMessage();
            }
        }

    }

?>