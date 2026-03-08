<?php
require 'Usuario.php';
class Admin extends Usuario
{
    public function getRol(){
        return "Administrador";
    }
}
?>