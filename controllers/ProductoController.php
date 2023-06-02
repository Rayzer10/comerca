<?php

include("models/CategoriaModel.php");
include("models/MarcaModel.php");
include("models/ProveedorModel.php");
include("models/VentasModel.php");

class ProductoController{

    public function __construct(){
        $this->productos = new ProductoModel;
        $this->categoria = new CategoriaModel;
        $this->marca = new MarcaModel;
        $this->proveedor = new ProveedorModel;
        $this->ventas = new VentasModel;
    }
    
    /* MUESTRA LA LISTA DE DATOS */
    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Lista de Productos";
            (isset($_POST['filtro'])) ? $filtro = $_POST['filtro'] : $filtro = null;
            $data = $this->productos->mostrar($filtro);
            include("public/views/productos/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    /* LLAMA A LA VISTA DE AGREGAR CORRESPONDIENTE AL NOMBRE DE LA CARPETA QUE HACE MENCIÓN EL CONTROLADOR */
    public function formulario(){
        if(isset($_SESSION['session'])):
            $titulo = "Agregar Nuevo Producto";
            $cat = $this->categoria->mostrar();
            $mar = $this->marca->mostrar();
            $pro = $this->proveedor->mostrar();
            include("public/views/productos/agregar.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    /* OBTIENE LOS DATOS DEL FORMULARIO DE AGREGAR PARA SER ENVIADOS AL MODELO PARA SU POSTERIOR INSERCIÓN EN LA BD */
    public function agregar(){
        $producto = array(
            'codigo' => trim(strtolower($_POST['codigo'])),
            'nombre' => trim($_POST['nombre']),
            'cantidad' => $_POST['cantidad'],
            'fecha' => $_POST['fecha'],
            'fecha_vencimiento' => $_POST['fecha_vencimiento'],
            'id_marca' => trim(strtolower($_POST['marca'])),
            'id_categoria' => trim(strtolower($_POST['categoria'])),
            'rif' => trim($_POST['rif']),
            'ci' => $_SESSION['ci']
        );
        /* var_dump($producto);
        var_dump($almacen);
        exit(); */
        $result1 = $this->productos->agregar($producto);

        if($result1!==false)
            echo "Producto registrado exitosamente";
        else
            echo "Error";
    }

    /* MUESTRA LA VISTA CON LOS RESULTADOS ESPECÍFICOS DE ACUERDO A MODULO QUE SE ESTE LLAMANDO */
    public function detalles(){
        if(isset($_SESSION['session'])):
            $codigo = explode("?codigo=", paramers);
            $codigo = end($codigo);
            $titulo = "Detalles del Producto";
            (!empty(base64_decode($codigo))) ? $data = $this->productos->detalles(base64_decode($codigo)) : header("location:".url_global."/productos");
            if($data != false):
                include("public/views/productos/detalles.php");
            else:
                header("location:".url_global."/producto");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    /* LLAMA A LA VISTA DE EDITAR CORRESPONDIENTE AL NOMBRE DE LA CARPETA QUE HACE MENCIÓN EL CONTROLADOR */
    public function editar(){
        if(isset($_SESSION['session'])):
            $codigo = explode("?codigo=", paramers);
            $codigo = end($codigo);
            $codigo = urldecode($codigo);
            $cat = $this->categoria->mostrar();
            $mar = $this->marca->mostrar();
            $titulo = "Editar Producto";
            (!empty(base64_decode(urldecode($codigo)))) ? $data = $this->productos->detalles(base64_decode(urldecode($codigo))) : header("location:".url_global."/producto");
            if($data != false):
                include("public/views/productos/editar.php");
            else:
                header("location:".url_global."/producto");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    /* OBTIENE LOS DATOS DEL FORMULARIO DE EDITAR PARA SER ENVIADOS AL MODELO PARA SU POSTERIOR ACTUALIZACIÓN EN LA BD */
    public function actualizar(){
        $data = array(
            'codigo' => trim(strtolower($_POST['codigo'])),
            'nombre' => trim($_POST['nombre']),
            'id_marca' => $_POST['marca'],
            'id_categoria' => $_POST['categoria']
        );
        $codigo = $_POST['codigo_hidden'];
        $result = $this->productos->actualizar($data, $codigo);
        if(!$result)
            echo "Datos actualizados exitosamente";
        else
            echo "Error";
    }

    /* GENERA UN REGISTRO DE LA VENTA DEL PRODUCTO */
    public function ventas(){
        $data = array(
            'codigo' => $_POST['codigo'],
            'nombre' => $_POST['nombre'],
            'venta' => $_POST['venta']
        );
        $this->ventas->vendido($data);
    }

    /* ELIMINA UN REGISTRO EN ESPECIFICO DE LA BASE DE DATOS CORRESPONDIENTE AL CONTROLADOR/MODELO */
    public function eliminar(){
        $codigo = $_POST['codigo'];
        /* var_dump($codigo);
        exit(); */
        $result = $this->productos->eliminar($codigo);
        if(!$result)
            echo "true";
        else
            echo "false";
    }

    /* FUNCIÓN DE CONSULTA PARA EL HISTORIAL DE VENTAS DE UN PRODUCTO */
    public function details(){
        try{
            $data = [];
            $sql = "SELECT * FROM salida WHERE codigo = ? ORDER BY id DESC";
            $stmt = $this->productos->consulta($sql);
            $stmt->execute([$_POST['codigo']]);
            while($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                $data[] = $rows;
            }
            echo json_encode($data);
        } catch(PDOException $e){
            echo "Error al mostrar los resultados: " . $e->getMessage();
        }
    }

    public function descartar(){
        if(isset($_SESSION['session'])):
            $titulo = "Descartar";
            $codigo = explode("?codigo=", paramers);
            $codigo = end($codigo);
            $codigo = base64_decode(urldecode($codigo));
            (!empty($codigo)) ? $data = $this->productos->detalles($codigo) : header("location:".url_global."/producto");
            if($data != false):
                include("public/views/productos/descartar.php");
            else:
                header("location:".url_global."/producto");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function adddescar(){
        $data = array(
            "motivo" => trim($_POST['motivo']), 
            "codigo_producto" => $_POST['codigo']
        );
        $result = $this->productos->adddescar($data);
        if(is_null($result))
            echo "Producto descartado exitosamente";
        else
            echo "Error";
    }

    public function masvendidos(){
        try{
            $sql = "SELECT p.codigo, p.nombre, c.nombre AS categoria, COALESCE(SUM(v.cantidad), 0) AS 'vendidos' FROM categoria c JOIN productos p ON c.id = p.id_categoria JOIN proveedor pv ON p.rif = pv.rif LEFT OUTER JOIN salida v ON v.codigo = p.codigo WHERE (SELECT COUNT(*) FROM descartar WHERE p.codigo=codigo_producto)<1 GROUP BY  p.nombre ORDER BY COALESCE(SUM(v.cantidad), 0) DESC";
            $query = $this->productos->consulta($sql);
            $query->execute();
            if($query->rowCount() > 0){
                $data = $query->fetchAll(PDO::FETCH_OBJ);
                include('public/recursos/reportes/examples/masvendidos.php');
            }else
                echo "Error";  
        } catch(PDOException $e){
            echo "Error al listar" . $e->getMessage();
        }
    }

    public function menosvendidos(){
        try{
            $sql = "SELECT p.codigo, p.nombre, c.nombre AS categoria, COALESCE(SUM(v.cantidad), 0) AS 'vendidos' FROM categoria c JOIN productos p ON c.id = p.id_categoria JOIN proveedor pv ON p.rif = pv.rif LEFT OUTER JOIN salida v ON v.codigo = p.codigo WHERE (SELECT COUNT(*) FROM descartar WHERE p.codigo=codigo_producto)<1 GROUP BY  p.nombre ORDER BY COALESCE(SUM(v.cantidad), 0) ASC";
            $query = $this->productos->consulta($sql);
            $query->execute();
            if($query->rowCount() > 0){
                $data = $query->fetchAll(PDO::FETCH_OBJ);
                include('public/recursos/reportes/examples/menosvendidos.php');
            }else
                echo "Error";  
        } catch(PDOException $e){
            echo "Error al listar" . $e->getMessage();
        }
    }

    public function pocostock(){
        try{
            $sql = "SELECT p.nombre, c.nombre AS categoria, SUM(p.cantidad) AS stock, (SUM(p.cantidad) - COALESCE(s.total_salida, 0)) AS restante FROM categoria c JOIN productos p ON c.id = p.id_categoria JOIN proveedor pv ON p.rif = pv.rif LEFT JOIN ( SELECT s.nombre, SUM(s.cantidad) AS total_salida FROM salida s GROUP BY s.nombre ) s ON p.nombre = s.nombre WHERE (SELECT COUNT(*) FROM descartar WHERE p.codigo=codigo_producto)<1 GROUP BY p.nombre ORDER BY restante";
            $query = $this->productos->consulta($sql);
            $query->execute();
            if($query->rowCount() > 0){
                $data = $query->fetchAll(PDO::FETCH_OBJ);
                include('public/recursos/reportes/examples/pocostock.php');
            }else
                echo "Error";  
        } catch(PDOException $e){
            echo "Error al listar" . $e->getMessage();
        }
    }

    public function porvencerse(){
        try{
            $sql = "SELECT p.* FROM productos p JOIN salida s ON (p.codigo = s.codigo) WHERE (p.cantidad - (SELECT SUM(cantidad) FROM salida WHERE codigo = p.codigo)) > 0 AND (SELECT DATEDIFF(fecha_vencimiento, CURDATE()) FROM productos WHERE codigo = p.codigo) <= 30 AND (SELECT COUNT(*) FROM descartar WHERE p.codigo=codigo_producto)<1 GROUP BY p.codigo ORDER BY fecha_vencimiento DESC";
            $query = $this->productos->consulta($sql);
            $query->execute();
            if($query->rowCount() > 0){
                $data = $query->fetchAll(PDO::FETCH_OBJ);
                include('public/recursos/reportes/examples/porvencerse.php');
            }else
                echo "Error";  
        } catch(PDOException $e){
            echo "Error al listar" . $e->getMessage();
        }
    }

}

?>