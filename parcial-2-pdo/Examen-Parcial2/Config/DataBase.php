<?php
//AGUAYO BRUN
namespace App\Config;
use PDO;
use PDOException;

class DataBase {
private string $host = "localhost";
private string $db = "store";
private string $username = "root";
private string $password = "";
private PDO $connection;

public function __construct(){
try {
    $dsn = "mysql:host={$this -> host};dbname={$this -> db};charset=utf8mb4";
    $this -> connection = new PDO ($dsn, $this-> username, $this -> password) ;

    $this -> connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this -> connection -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     
} catch (PDOException $e) {
die ("Error de conexion:" . $e -> getMessage());
}
}
public function getConnection() : PDO{
    return $this -> connection;
}
}

?>