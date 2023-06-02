<?php

    class VentasModel extends Conection{

        public function vendido($data){
            try{
                $sql = "SELECT SUM(cantidad) AS 'ventas' FROM salida WHERE codigo = ?";
                $alma = "SELECT cantidad FROM productos WHERE codigo = ?";

                $qven = $this->db->prepare($sql);
                $qven->execute([$data['codigo']]);

                $qal = $this->db->prepare($alma);
                $qal->execute([$data['codigo']]);

                $v = $qven->fetch(PDO::FETCH_OBJ);
                $a = $qal->fetch(PDO::FETCH_OBJ);
                
                if($v->ventas == NULL || (($v->ventas + $data['venta']) <= $a->cantidad)){
                    $sql = "INSERT INTO salida (nombre, cantidad, fecha, codigo) VALUES (?, ?, ?, ?)";
                    $query = $this->db->prepare($sql);
                    $query->execute([$data['nombre'], $data['venta'], date("Y-m-d"), $data['codigo']]);
                    if($query->rowCount() > 0)
                        $this->historial("Se registro una nueva venta");
                    else
                        echo "false"; 
                }else
                    echo "false"; 
            }catch(PDOException $e){
                $e->getMessage();
            }
        }

    }

?>