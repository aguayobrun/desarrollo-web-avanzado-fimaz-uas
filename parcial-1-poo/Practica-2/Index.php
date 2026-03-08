<?php
require_once 'Admin.php';
class Index extends Admin
{
    public function mostrarInformacion()
    {
        echo "Nombre: " . $this->getNombre() . "<br>";
        echo "Email: " . $this->getEmail() . "<br>";
        echo "Rol: " . $this->getRol() . "<br>";
    }
}
$usuario = new Index("jhoony", "jhoony@gmail.com");
$usuario->mostrarInformacion();
?>