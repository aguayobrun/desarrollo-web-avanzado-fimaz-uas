<?php
require_once __DIR__ . '/../../controller/torneoscontroller.php';
$id = $_GET['id'] ?? null;
if (!$id){
    header("Location: readAllTorneos.php");
    exit();
}
$objTorneos = new TorneoController();
$objTorneos -> deleteTorneo($_GET['id']);
class deleteTorneo {
    public $controller;

    public function __construct() {
        $this -> controller = new TorneoController();
    }

    public function deleteTorneo($id) {
        return ($this -> controller -> deleteTorneo($id)) ? header("Location: readAllTorneos.php") :
         header("Location: readOneTorneo.php?id=".$id);
    }
}
?>