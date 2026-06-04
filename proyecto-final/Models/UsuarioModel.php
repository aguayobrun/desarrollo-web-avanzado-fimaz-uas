
<?php
/* la clase usuariomodel en php es usada para interactuar con la base de datos
para buscar un usuario por su nombre de usuario*/
namespace Models;
use Config\DataBase;
use PDO;
use PDOException;

class UsuarioModel {
    private PDO $conexion;
    public function __construct(){
        $db = new DataBase();
        $this -> conexion = $db -> connect();
    }
    public function buscarPorUsername (string $username) : ?array {
        try {
            $sql = "SELECT * FROM usuario WHERE username = :username LIMIT 1";
            $stmt = $this -> conexion -> prepare ($sql);
            $stmt -> bindParam(':username', $username);
            $stmt -> execute();
            $usuario = $stmt -> fetch();
            return $usuario ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }
}
?>