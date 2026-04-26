<?php
//AGUAYO BRUN
namespace App\Controller;

use App\config\DataBase;
use App\model\Product;
use PDO;
use PDOException;
class ProductController {
    private $connection;
    public function __construct (){
        $database = new DataBase();
        $this -> connection = $database -> getConnection();
    }
    public function crear (Product $product){
        $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio )
        VALUES (:nombre, :descripcion, :existencia,:precio)";
        $stmt = $this -> connection -> prepare($sql);
        
        $nombre = $product -> getNombre();
        $descripcion = $product -> getDescripcion();
        $existencia = $product -> getExistencia();
        $precio = $product -> getPrecio();

        $stmt -> bindParam(':nombre', $nombre);
        $stmt -> bindParam(':descripcion', $descripcion);
        $stmt -> bindParam(':existencia', $existencia);
        $stmt -> bindParam(':precio', $precio);

        return $stmt -> execute();
    }

    public function listar (){
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerPorId (int $id){
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    public function actualizar (Product $product){
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, existencia = :existencia, precio = :precio WHERE id = :id";
        $stmt = $this -> connection -> prepare($sql);
        
        $id = $product -> getId();
        $nombre = $product -> getNombre();
        $descripcion = $product -> getDescripcion();
        $existencia = $product -> getExistencia();
        $precio = $product -> getPrecio();

        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> bindParam(':nombre', $nombre);
        $stmt -> bindParam(':descripcion', $descripcion);
        $stmt -> bindParam(':existencia', $existencia, PDO::PARAM_INT);
        $stmt -> bindParam(':precio', $precio);
        

        return $stmt -> execute();
    }
    public function eliminar (int $id){
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this -> connection -> prepare($sql);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt -> execute();
    
}
public function buscar (string $termino){
    $sql = "SELECT * FROM productos WHERE nombre LIKE :termino OR descripcion LIKE :termino ORDER BY id DESC";
    $stmt = $this -> connection -> prepare($sql);
    $stmt -> bindValue(':termino', '%' . $termino . '%');
    $stmt -> execute();
    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}
}

?>