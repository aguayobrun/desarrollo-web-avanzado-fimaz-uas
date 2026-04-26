<?php
//AGUAYO BRUN
namespace App\Model;
class Product {

    private $id;
    private $nombre;
    private $precio;
    private $descripcion;
    private $existencia;

    public function __construct($id = null, $nombre = "", $descripcion = "", $existencia = 0, $precio = "0.00") {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this -> existencia = $existencia;
        $this -> precio = $precio;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getExistencia() {
        return $this->existencia;
    }

    public function setExistencia($existencia) {
        $this->existencia = $existencia;
    }
}

?>