<?php
class Usuario
{
    private $nombre;
    private $email;

    public function __construct($nombre, $email)
    {
        $this->nombre = $nombre;
        $this->email = $email;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}

?>