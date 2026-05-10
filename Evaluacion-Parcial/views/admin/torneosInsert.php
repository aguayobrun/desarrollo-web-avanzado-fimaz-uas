<?php
require_once __DIR__ . '/../../controller/torneoscontroller.php';


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
header ("Location: frmTorneos.php");
exit();
}

$nombreTorneo = $_POST['txtnombreTorneo'] ?? '';
$organizador = $_POST['txtorganizador'] ?? '';
$patrocinador = $_POST['txtpatrocinador'] ?? '';  
$sede = $_POST['txtsede'] ?? '';
$categoria = $_POST['txtcategoria'] ?? '';    
$premio = $_POST['txtpremio1'] ?? '';
$premio2 = $_POST['txtpremio2'] ?? '';
$premio3 = $_POST['txtpremio3'] ?? '';
$otroPremio = $_POST['txtotroPremio'] ?? '';
$usuario = $_POST['txtusuario'] ?? '';
$contraseña = $_POST['txtcontraseña'] ?? '';

$objController = new TorneoController();
$objController -> saveTorneo($nombreTorneo, $organizador, $patrocinador, $sede, $categoria,
    $premio, $premio2, $premio3, $otroPremio, $usuario, $contraseña);



?>