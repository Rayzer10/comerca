<?php

    class LoginModel extends Conection{

        public function login($user, $pass){
            try{
                $sql = "SELECT * FROM usuarios WHERE username = ? AND estado = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$user, 1]);
                if($stmt->rowCount() > 0){
                    $result = $stmt->fetch(PDO::FETCH_OBJ);
                    if($result->password == md5($pass)){
                        $_SESSION['username'] = $result->username;
                        $_SESSION['ci'] = $result->ci;
                        $_SESSION['nombre'] = ucfirst(strtolower($result->nombre))." ".ucfirst(strtolower($result->apellido));
                        $_SESSION['rol'] = $result->rol;
                        $_SESSION['session'] = true;
                        echo "true";
                    }else{
                        echo "La contraseña no coincide";
                    }
                }
                else
                    echo "El nombre de usuario no existe"; 

            } catch(PDOException $e){
                echo "Error al realizar la consulta ".$e->getMessage();
            }
        }

    }

?>