<?php
require_once __DIR__ . '/../config/DataBase.php';

class TorneoModel {
    public $PDO;

    public function __construct() {
        $conexion = new DataBase();
        $this -> PDO = $conexion -> connect();
    }

    public function insert($nombreTorneo, $organizador, $patrocinador, $sede, $categoria,
    $premio, $premio2, $premio3, $otroPremio, $usuario, $contraseña) {

        $contraseña = $this -> passwordEncrypt($contraseña);

        $statement = $this -> PDO -> prepare ("INSERT INTO torneos VALUES (null, :nombre_torneo, :organizador, :patrocinador, 
        :sede, :categoria, :premio, :premio2, :premio3, :otro_premio, :usuario, :password)");
        $statement -> bindParam(':nombre_torneo', $nombreTorneo);
        $statement -> bindParam(':organizador', $organizador);
        $statement -> bindParam(':patrocinador', $patrocinador);
        $statement -> bindParam(':sede', $sede);
        $statement -> bindParam(':categoria', $categoria);
        $statement -> bindParam(':premio', $premio);
        $statement -> bindParam(':premio2', $premio2);
        $statement -> bindParam(':premio3', $premio3);
        $statement -> bindParam(':otro_premio', $otroPremio);
        $statement -> bindParam(':usuario', $usuario);
        $statement -> bindParam(':password', $contraseña);
        return ($statement -> execute()) ? $this -> PDO -> lastInsertId() : false;
    }
    public function passwordEncrypt($contraseña) {
        $passwordEncrypt = password_hash($contraseña, PASSWORD_DEFAULT);
        return $passwordEncrypt;
    }
    public function passwordEncrypted($passwordEncrypt, $passwordCandidate){
        return (password_verify($passwordCandidate, $passwordEncrypt)) ? true : false;
    }
    //regresa info de todos los torneos
    public function read() {
        $statement = $this -> PDO -> prepare("SELECT * FROM torneos");
        return ($statement -> execute()) ? $statement -> fetchAll() : false;
    }
    //regresa info del torneo especificado
    public function readOne($id){
        $statement = $this -> PDO -> prepare ("SELECT * FROM torneos WHERE id = :id LIMIT 1");
        $statement -> bindParam(':id', $id);
        return ($statement -> execute()) ? $statement -> fetch() : false;

    }
    public function update($id, $nombreTorneo, $organizador, $patrocinador, $sede, $categoria,
    $premio, $premio2, $premio3, $otroPremio) {

        $statement = $this -> PDO -> prepare ("UPDATE torneos SET nombre_torneo = :nombre_torneo, organizador = :organizador, 
        patrocinador = :patrocinador, 
        sede = :sede, categoria = :categoria, premio = :premio, premio2 = :premio2, premio3 = :premio3, otro_premio = :otro_premio
          WHERE id = :id");

        $statement -> bindParam(':id', $id);
        $statement -> bindParam(':nombre_torneo', $nombreTorneo);
        $statement -> bindParam(':organizador', $organizador);
        $statement -> bindParam(':patrocinador', $patrocinador);
        $statement -> bindParam(':sede', $sede);
        $statement -> bindParam(':categoria', $categoria);
        $statement -> bindParam(':premio', $premio);
        $statement -> bindParam(':premio2', $premio2);
        $statement -> bindParam(':premio3', $premio3);
        $statement -> bindParam(':otro_premio', $otroPremio);
       return ($statement -> execute()) ? $id : false;

    }
    public function delete ($id) {
        $statement = $this -> PDO -> prepare("DELETE FROM torneos where id = :id");
        $statement -> bindParam(':id', $id);
        return ($statement -> execute()) ? true : false;
    }
}
?>