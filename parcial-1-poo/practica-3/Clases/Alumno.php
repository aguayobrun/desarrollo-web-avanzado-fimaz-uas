<?php
require_once 'Usuario.php';
class Alumno extends Usuario
{
    private $matricula;
    public function __construct($nombre, $email, $matricula)
    {
        parent::__construct($nombre, $email);
        $this->matricula = $matricula;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }
    public function getRol(){
        return "Alumno";
    }
}
?>