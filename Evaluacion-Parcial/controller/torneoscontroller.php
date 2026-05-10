<?php
require_once __DIR__ . '/../model/torneomodels.php';
class TorneoController {
    public $model;

    public function __construct() {
        $this -> model = new TorneoModel();
    }

    public function saveTorneo($nombreTorneo, $organizador, $patrocinador, $sede, $categoria,
    $premio, $premio2, $premio3, $otroPremio, $usuario, $contraseña) {
        $id = $this -> model -> insert($nombreTorneo, $organizador, $patrocinador, $sede, $categoria,
        $premio, $premio2, $premio3, $otroPremio, $usuario, $contraseña);
        return ($id != false) ? header("Location: admin.php") : header("Location: frmTorneos.php");
    }
    //regresa todos los torneos
    public function readTorneos() {
        return ($this -> model->read()) ? $this -> model -> read() : false;
}
//solo lee la info del torneo especificado
    public function readOneTorneo($id) {
        return ($this -> model -> readOne($id)) ? $this -> model -> readOne($id) : header ("Location: admin.php");
}

public function updateTorneo($id, $nombreTorneo, $organizador, $patrocinador, $sede, $categoria,
    $premio, $premio2, $premio3, $otroPremio) {
        return ($this -> model -> update($id, $nombreTorneo, $organizador, $patrocinador, $sede, $categoria,
            $premio, $premio2, $premio3, $otroPremio)) != false ? header("Location: readOneTorneo.php?id=".$id) 
            : header("Location: readAllTorneos.php?id=".$id);
    }
public function deleteTorneo($id) {
        return ($this -> model -> delete($id)) ? header("Location: readAllTorneos.php") :
         header("Location: readOneTorneo.php?id=".$id);
}
}
?>