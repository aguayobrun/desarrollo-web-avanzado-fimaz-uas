<?php
namespace Controllers;
use Models\ProductoModel;

class ProductoController {
    private ProductoModel $productoModel;
    public function __construct() {
        $this -> productoModel = new ProductoModel();
    }
    private function verificarSesion() : void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?route=login');
            exit();
        }
    }
    public function index() : void {
        $this -> verificarSesion();
        $productos = $this -> productoModel -> obtenerTodos();
        require_once __DIR__ . '/../views/productos/index.php';
    }
    public function create () : void {
        $this -> verificarSesion();
        require_once __DIR__ . '/../views/productos/create.php';
    }
    public function store() : void {
        $this -> verificarSesion();
        $data = [
            'sku' => trim($_POST['sku'] ?? ''),
            'nombre' => trim($_POST['nombre'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
            'precio_compra' => trim($_POST['precio_compra'] ?? ''),
            'precio_venta' => trim($_POST['precio_venta'] ?? ''),
            'existencia' => trim($_POST['existencia'] ?? '')
        ];
        if (
            $data['sku'] === '' ||
            $data['nombre'] === '' ||
            $data['precio_compra'] === '' ||
            $data['precio_venta'] === '' ||
            $data['existencia'] === ''
        ) {
            $_SESSION['error'] = 'todos los campos son obligatorios.';
            header('Location: index.php?route=productos/create');
            exit();
        }
        if (!is_numeric($data ['precio_compra']) || !is_numeric($data ['precio_venta'])
            || !is_numeric($data ['existencia']) ) {
            $_SESSION['error'] = 'los campos de precio y existencia deben ser numéricos.';
            header('Location: index.php?route=productos/create');
            exit();
        }
        
        if ((float)($data ['precio_compra']) < 0 || (float)($data ['precio_venta']) < 0
            || (int)($data ['existencia']) < 0 ) {
            $_SESSION['error'] = 'no se permiten valores negativos';
            header('Location: index.php?route=productos/create');
            exit();
        }
        if ($this -> productoModel -> crear ($data)) {
            $_SESSION['success'] = 'producto creado exitosamente.';
        } else {
            $_SESSION['error'] = 'error al crear el producto.';
        }
        header('Location: index.php?route=productos');
        exit();
    }

        public function edit() : void {
            $this -> verificarSesion();
            $id = (int) ($_GET['id'] ?? 0);
            $producto = $this -> productoModel -> obtenerPorId($id);
            if (!$producto) {
                $_SESSION['error'] = 'producto no encontrado.';
                header('Location: index.php?route=productos');
                exit();
            }
            require_once __DIR__ . '/../views/productos/edit.php';
        }
        public function update() : void {
            $this -> verificarSesion();
            $id = (int) ($_POST['id'] ?? 0);
            $data = [
                'sku' => trim($_POST['sku'] ?? ''),
                'nombre' => trim($_POST['nombre'] ?? ''),
                'descripcion' => trim($_POST['descripcion'] ?? ''),
                'precio_compra' => trim($_POST['precio_compra'] ?? ''),
                'precio_venta' => trim($_POST['precio_venta'] ?? ''),
                'existencia' => trim($_POST['existencia'] ?? '')
            ];
            if ($id == 0) {
                $_SESSION['error'] = 'id de producto no válido.';
                header('Location: index.php?route=productos');
                exit();
            }
            if (
                $data['sku'] === '' ||
                $data['nombre'] === '' ||
                $data['precio_compra'] === '' ||
                $data['precio_venta'] === '' ||
                $data['existencia'] === ''
            ) {
                $_SESSION['error'] = 'todos los campos son obligatorios.';
                header('Location: index.php?route=productos/edit&id=' . $id);
                exit();
            }
            if (!is_numeric($data ['precio_compra']) || !is_numeric($data ['precio_venta'])
                || !is_numeric($data ['existencia']) ) {
                $_SESSION['error'] = 'los campos de precio de compra, precio de venta y existencia deben ser numéricos.';
                header('Location: index.php?route=productos/edit&id=' . $id);
                exit();
            }
            if ((float)($data ['precio_compra']) < 0 || (float)($data ['precio_venta']) < 0
                || (int)($data ['existencia']) < 0 ) {
                $_SESSION['error'] = 'no se permiten valores negativos';
                header('Location: index.php?route=productos/edit&id=' . $id);
                exit();
            }
            if ($this -> productoModel -> actualizar($id, $data)) {
                $_SESSION['success'] = 'producto actualizado exitosamente.';
            } else {
                $_SESSION['error'] = 'error al actualizar el producto.';
            }
            header('Location: index.php?route=productos');
            exit();
        }
        public function delete() : void {
            $this -> verificarSesion();
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                $_SESSION['error'] = 'id invalido';
                header ('Location: index.php?route=productos');
                exit();       
        } else {
            if ($this -> productoModel -> eliminar($id)) {
                $_SESSION['success'] = 'producto eliminado exitosamente.';
            } else {
                $_SESSION['error'] = 'error al eliminar el producto.';
            }
            header('Location: index.php?route=productos');
            exit();
        }
    
}

}
  
?>