<?php
class Usuario
{
    private $nombre;
    private $email;

    public function __construct($nombre = "", $email = "")
    {
        $this->unombre = $nombre;
        $this->uemail = $email;
    }
    public function getNombre()
    {
        return $this->unombre;
    }
    public function getEmail() {
        return $this->uemail;
    }

    public function setNombre($nombre)
    {
        $this->unombre = $nombre;
    }
    public function setEmail($email)
    {
        $this->uemail = $email;
    }
}

?>