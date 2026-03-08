<?php
require_once 'Clases/Admin.php';
require_once 'Clases/Alumno.php';

try {   
$admin = new Admin ("jhoony", "jhoony@gmail.com");
    
        echo "Nombre: " . $admin->getNombre() . "<br>";
        echo "Email: " . $admin->getEmail() . "<br>";
        echo "Rol: " . $admin->getRol() . "<br>";
    $alumno = new Alumno ("maria", "maria@gmail.com", "897609");
        echo "Nombre: " . $alumno->getNombre() . "<br>";
        echo "Email: " . $alumno->getEmail() . "<br>";
        echo "Rol: " . $alumno->getRol() . "<br>";
        echo "Matrícula: " . $alumno->getMatricula() . "<br>";
        $usuarioError = new Admin ("Error", "correoInvalido");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>