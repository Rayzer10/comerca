<?php

    class HistorialModel extends Conection{

        public function mostrar(){
           /* ($_SESSION['rol'] == 1) ? $where = "" : $where = "WHERE ci=".$_SESSION['ci']."";

            $sql = "SELECT * FROM historial INNER JOIN usuarios on (ci_usuario=ci) ".$where." ORDER BY id DESC";
            $query = $this->db->query($sql);
            if($query->num_rows > 0 )
                return $query;
            else
                return false; */

            /* $sql = "SELECT * FROM historial INNER JOIN usuarios on (ci_usuario=ci) ".$where." ORDER BY id DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0)
                $result = $stmt->fetchAll(PDO::FETCH_OBJ); */
            try{
                ($_SESSION['rol'] == 1) ? $where = "" : $where = "WHERE ci = ?";
                $sql = "SELECT * FROM historial INNER JOIN usuarios on (ci_usuario=ci) ".$where." ORDER BY id DESC";
                $stmt = $this->db->prepare($sql);
                if($_SESSION['rol']!=1){$stmt->execute([$_SESSION['ci']]);}
                $stmt->execute();
                return $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
            } catch(PDOException $e) {
                echo "Error al mostrar la lista: " . $e->getMessage();
            }
        }

    }

?>