<?php
class DataBase{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "practicas";


    public function connect(){
        try {
            $conexion = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            // set the PDO error mode to exception
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch(PDOException $e) {
            echo "Conexion fallida: " . $e->getMessage();
            return null;
        }
    }
}
?>