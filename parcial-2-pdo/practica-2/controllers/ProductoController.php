<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    private $connection;
    public function __construct(){
     $database = new Database();
     $this -> connection = $database -> getConnection();
    }
    
    public function crear(Producto $producto){
        $sql = "INSERT INTO producto (nombre, descripcion, existencia, precio)
        VALUES (:nombre, :descripcion, :existencia, :precio)";
    $stnt = $this -> connection -> prepare($sql);
    $stnt -> bindValue (':nombre', $producto -> getNombre());
    $stnt -> bindValue (':descripcion', $producto -> getDescripcion());
    $stnt -> bindValue (':existencia', $producto -> getExistencia(), PDO::PARAM_INT);
    $stnt -> bindValue (':precio', $producto -> getPrecio());
    return $stnt -> execute();
    }
    public function listar (){
        $sql = "SELECT * FROM producto ORDER BY id DESC";
        $stnt = $this -> connection -> prepare ($sql);
        $stnt -> execute();
        return $stnt -> fetchAll();
    }
    public function obtenerPorId ($id){
        $sql = "SELECT * FROM producto WHERE id = :id";
        $stnt = $this -> connection -> prepare ($sql);
        $stnt -> bindValue (':id', $id, PDO::PARAM_INT);
        $stnt -> execute ();
       return $stnt -> fetch(); 
    }
    public function actualizar (Producto $producto){
$sql = "UPDATE producto
SET nombre = :nombre, descripcion = :descripcion, existencia = :existencia, precio = :precio
WHERE id = :id";
$stnt = $this -> connection -> prepare($sql);
$stnt -> bindValue (':id', $producto -> getId(), PDO::PARAM_INT);
$stnt -> bindValue (':nombre', $producto -> getNombre());
    $stnt -> bindValue (':descripcion', $producto -> getDescripcion());
    $stnt -> bindValue (':existencia', $producto -> getExistencia(), PDO::PARAM_INT);
    $stnt -> bindValue (':precio', $producto -> getPrecio());
    return $stnt -> execute();
    
    }
public function eliminar ($id){
        $sql = "DELETE FROM producto WHERE id = :id";
        $stnt = $this -> connection -> prepare ($sql);
        $stnt -> bindValue (':id', $id, PDO::PARAM_INT);
        $stnt -> execute ();
       return $stnt -> execute(); 
    }
public function buscar ($termino) {
    $sql = "SELECT * FROM producto
    WHERE nombre LIKE :termino
    OR descripcion LIKE :termino
    ORDER BY id DESC";
    $stnt = $this -> connection -> prepare ($sql);
    $stnt -> bindValue (':termino', '%' . $termino . '%');
    $stnt -> execute ();
    return $stnt -> fetchAll();
}
}
?>