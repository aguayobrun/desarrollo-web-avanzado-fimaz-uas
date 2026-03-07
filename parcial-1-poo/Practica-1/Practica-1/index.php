<?php
include 'Usuario.php';
$usuario = new Usuario();

$usuario->setNombre("johnny bravo");
$usuario->setEmail("johnnybravo@gmail.com");
echo "su nombre es: " . $usuario->getNombre() . "<br>";
echo "su email es: " . $usuario->getEmail() . "<br>";
?>