<?php
require_once __DIR__ . '/../../Models/ProductoModel.php';
use Models\ProductoModel;
class ApiProductoController {
    private $db;
    private $productos;
    
    public function __construct() {
        
        $this -> productos = new ProductoModel();
    }
   
    public function verificarToken(): void {
    $token = $_SERVER['HTTP_X_API_KEY'] ?? '';

    if ($token !== 'mi_token_secreto') {
        http_response_code(401);
        echo json_encode(['error' => 'Token de autenticación inválido']);
        exit();
    }
}

    //enrutador principal
    public function manejar (String $method, ?int $id) :void {
        switch ($method) {
            case 'GET' : $id ? $this-> show($id) : $this -> index(); break;
            case 'POST' : $this -> store(); break;
            case 'PUT' : 
                if ($id) {
                    $this -> update($id);
                } else {
                    http_response_code(400);
                    echo json_encode(['error' => 'ID de producto requerido para actualizar']);
                }
                break;
            case 'DELETE' :
                if ($id) {
                    $this -> delete($id);
                } else {
                    http_response_code(400);
                    echo json_encode(['error' => 'ID de producto requerido para eliminar']);
                }
                break;
            default :
            http_response_code(405);
            echo json_encode(['error' => 'Método no permitido']);
        }
    }

    //get /api/productos
    private function index() : void {
        $this -> verificarToken();
        $productos = $this -> productos -> obtenerTodos();
       
       if ($productos) {
        echo json_encode($productos);
       } else {
        http_response_code(404);
        echo json_encode(["error" => "error al obtener los productos"]);
       }
        }

    //get /api/productos/{id}
    private function show(int $id) : void {
        $this -> verificarToken();
        $producto = $this -> productos -> obtenerPorId($id);
        if ($producto) {
            echo json_encode($producto);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "producto no encontrado"]);
        }
    }

    //post /api/productos
    private function store() : void {
        $this -> verificarToken();
        $data = json_decode(file_get_contents('php://input'), true);
        if (
            empty($data['sku']) ||
            empty($data['nombre']) ||
            empty($data['precio_compra']) ||
            empty($data['precio_venta']) ||
            empty($data['existencia'])
        ) {
            http_response_code(422);
            echo json_encode(['error' => 'todos los campos son obligatorios']);
            return;
        }

        if (!is_numeric($data ['precio_compra']) || !is_numeric($data ['precio_venta'])
            || !is_numeric($data ['existencia']) ) {
            http_response_code(422);
            echo json_encode(['error' => 'los campos de precio de compra, precio de venta y existencia deben ser numéricos']);
            return;
        }

        if ((float)($data ['precio_compra']) < 0 || (float)($data ['precio_venta']) < 0
            || (int)($data ['existencia']) < 0 ) {
            http_response_code(422);
            echo json_encode(['error' => 'no se permiten valores negativos']);
            return;
        }

       if ($this -> productos -> crear($data)) {
            http_response_code(201);
            echo json_encode(["mensaje" => "producto creado exitosamente"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "error al crear el producto"]);
        }
    }
    private function update (?int $id) : void {
        $this -> verificarToken();
        if (!$id || $id <= 0) {
            http_response_code(400);
            echo json_encode(['error' => 'ID de producto inválido']);
            return;
        }
        $data = json_decode(file_get_contents("php://input"), true);
        if ( 
            !is_numeric($data ['precio_compra']) || !is_numeric($data ['precio_venta']) || !is_numeric($data ['existencia']) ) {
            http_response_code(422);
            echo json_encode(['error' => 'los campos de precio de compra, precio de venta y existencia deben ser numéricos']);
            return;
        }
        //validar negativos
        if ((float)($data ['precio_compra']) < 0 || (float)($data ['precio_venta']) < 0
            || (int)($data ['existencia']) < 0 ) {
            http_response_code(422);
            echo json_encode(['error' => 'no se permiten valores negativos']);
            return;
        }
        if ($this -> productos -> actualizar($id, $data)) {
            echo json_encode(["mensaje" => "producto actualizado exitosamente"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "error al actualizar el producto"]);
        }
    }
    //delete /api/productos/{id}
    private function delete (?int $id) : void {
        $this -> verificarToken();
        if (!$id || $id <= 0) {
            http_response_code(400);
            echo json_encode(['error' => 'ID de producto inválido']);
            return;
        }
        
        if ($this -> productos -> eliminar($id)) {
            echo json_encode(["mensaje" => "producto eliminado exitosamente"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "error al eliminar el producto"]);
        }
    }

}

?>