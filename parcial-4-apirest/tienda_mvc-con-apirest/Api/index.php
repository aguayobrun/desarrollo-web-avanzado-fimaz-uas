<?php

header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header ('Content-Type: application/json; charset=UTF-8');
header ('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once __DIR__ . '/../Config/AutoLoad.php';
require_once __DIR__ . '/Controller/ApiProductoController.php';


$method = $_SERVER['REQUEST_METHOD'];
$url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';
$partes = explode('/', $url);
$recurso = $partes[0] ?? '';
$id = isset($partes[1]) ? (int)$partes[1] : null;

switch ($recurso) {
    case 'productos': 
        $ctrl = new ApiProductoController();
        $ctrl -> manejar($method, $id);
        break;
    default :
        http_response_code(404);
        echo json_encode(['error' => 'Recurso no encontrado']);
        break;
}

?>