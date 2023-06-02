<?php

    class UsuariosModel extends Conection{

        public function mostrar(){
            try{
                $sql = "SELECT * FROM usuarios ORDER BY nombre";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar la lista: " . $e->getMessage();
            }
        }

        public function agregar($datos){
            try{
                $sql = $this->insert($datos, "usuarios");
                $arraySinClaves = array_values($datos);
                $stmt = $this->db->prepare($sql);
                $stmt->execute($arraySinClaves);
                $this->historial("agregó nuevo usuario");
            } catch(PDOException $e){
                echo "Error al agregar el registro: " . $e->getMessage();
            }
        }

        public function perfil($ci){
            try {
                $sql = "SELECT * FROM usuarios WHERE ci = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$ci]);
                return $result = $stmt->fetch(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar el valor específico: " . $e->getMessage();
            }
        }

        public function actualizar($data, $cedula){
            try{
                $n = 1;
                $sql = "UPDATE usuarios set ";
                foreach($data as $columns => $valores){
                    $sql.= $columns." = ?, ";
                }
                $sql = rtrim($sql, ", ");
                $sql.= " WHERE ci = ?";
                $stmt = $this->db->prepare($sql);
                $arraySinClaves = array_values($data);
                $stmt->execute(array_merge($arraySinClaves, [$cedula]));
                $this->historial("actualizó datos de usuario");
            } catch(PDOException $e){
                echo "Error al actualizar: " . $e->getMessage();
            }
        }

        public function estado($ci, $estado){
            try{
                $sql = "UPDATE usuarios SET estado = ? WHERE ci = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$estado, $ci]);
                if($stmt->rowCount() > 0)
                    $this->historial("cambió el estado de usuario");
                else
                    return false;
            } catch(PDOException $e) {
                echo "Error de consulta: " . $e->getMessage();
            }
        }

    }

?>