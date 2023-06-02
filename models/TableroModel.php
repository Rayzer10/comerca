<?php 

    class TableroModel extends Conection{

        public function mostrar(){
            try{
                $sql = "SELECT p.* FROM productos p JOIN salida s ON (p.codigo = s.codigo) WHERE (p.cantidad - (SELECT SUM(cantidad) FROM salida WHERE codigo = p.codigo)) > 0 AND (SELECT DATEDIFF(fecha_vencimiento, CURDATE()) FROM productos WHERE codigo = p.codigo) <= 30 AND (SELECT COUNT(*) FROM descartar WHERE p.codigo=codigo_producto)<1 GROUP BY p.codigo ORDER BY fecha_vencimiento DESC";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                if($stmt->rowCount() > 0)
                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                else
                    return false;
            } catch (PDOException $e){
                echo "Error al mostrar la lista: " . $e->getMessage();
            }
        }

    }

?>