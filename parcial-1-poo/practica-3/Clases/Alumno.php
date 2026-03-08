<<<<<<< HEAD
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
=======
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
>>>>>>> 5f4927aa7b013af799d3df74b4a182e9198b14f5
?>