<?php

    class ProductoModel extends Conection{

        public function consulta($sql){
            return $this->db->prepare($sql);
        }

        public function mostrar(){
            try{
                $sql = "SELECT p.codigo, p.nombre, p.fecha, fecha_vencimiento, pv.nombre AS nombre_proveedor, (p.cantidad - SUM(v.cantidad)) AS estado, SUM(v.cantidad) AS vendidos, p.cantidad AS stock, DATEDIFF(p.fecha_vencimiento, CURDATE()) AS timeout FROM productos p JOIN proveedor pv ON (p.rif=pv.rif) LEFT OUTER JOIN salida v ON (v.codigo=p.codigo) WHERE (SELECT COUNT(*) FROM descartar WHERE p.codigo=codigo_producto)<1 GROUP BY p.codigo ORDER BY p.nombre ASC, p.fecha DESC";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar la lista: " . $e->getMessage();
            }
        }

        public function agregar($producto){
            try{
                $sql = $this->insert($producto, "productos");
                $arraySinClaves = array_values($producto);
                $stmt = $this->db->prepare($sql);
                $stmt->execute($arraySinClaves);
                $this->historial("agregó nuevo producto");
            } catch(PDOException $e){
                echo "Error al agregar el registro: " . $e->getMessage();
            }
        }

        public function detalles($codigo){
            try {
                $sql = "SELECT p.codigo, p.nombre, pv.nombre AS 'nombre_proveedor', p.cantidad, p.fecha, fecha_vencimiento, SUM(v.cantidad) AS 'vendido', c.nombre AS 'categoria', m.nombre AS 'marca', (p.cantidad - SUM(v.cantidad)) AS 'stock' FROM proveedor pv JOIN productos p ON (p.rif=pv.rif) LEFT OUTER JOIN salida v ON (v.codigo=p.codigo) JOIN marca m ON (m.id=id_marca) JOIN categoria c ON (c.id=id_categoria) WHERE p.codigo = ? ORDER BY p.codigo";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$codigo]);
                return $result = $stmt->fetch(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar el valor específico: " . $e->getMessage();
            }
        }

        public function actualizar($data, $codigo){
            try{
                $sql = "UPDATE productos set ";
                foreach($data as $columns => $valores){
                    $sql.= $columns." = ?, ";
                }
                $sql = rtrim($sql, ", ");
                $sql.= " WHERE codigo = ?";
                $stmt = $this->db->prepare($sql);
                $arraySinClaves = array_values($data);
                $stmt->execute(array_merge($arraySinClaves, [$codigo]));

                $datos = array('nombre' => $data['nombre']);
                $sql2 = "UPDATE salida set ";
                foreach($datos as $columns => $valores){
                    $sql2.= $columns." = ?, ";
                }
                $sql2 = rtrim($sql2, ", ");
                $sql2.= " WHERE codigo = ?";
                $stmt2 = $this->db->prepare($sql2);
                $arraySinClaves2 = array_values($datos);
                $stmt2->execute(array_merge($arraySinClaves2, [$codigo]));

                if($stmt->rowCount() > 0 && $stmt2->rowCount() > 0)
                    $this->historial("actualizó datos de un producto");
            } catch(PDOException $e){
                echo "Error al actualizar: " . $e->getMessage();
            }
        }

        public function eliminar($codigo){
            try {
                $sql = "DELETE FROM productos WHERE codigo = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$codigo]);
                $this->historial("Eliminó un producto");
            } catch(PDOException $e){
                echo "Error al eliminar: " . $e->getMessage();
            }
        }

        public function adddescar($data){
            try{
                $sql = $this->insert($data, "descartar");
                $arraySinClaves = array_values($data);
                $stmt = $this->db->prepare($sql);
                $stmt->execute($arraySinClaves);
                $this->historial("descarto un producto");
            } catch(PDOException $e){
                echo "Error al agregar el registro: " . $e->getMessage();
            }
        }

        public function descartados(){
            try{
                $sql = "SELECT * FROM descartar";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e){
                echo "Error al mostrar la lista: " . $e->getMessage();
            }
        }

    }

?>