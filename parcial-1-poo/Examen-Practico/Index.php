<?php
require_once 'Clases/Admin.php';
require_once 'Clases/Alumno.php';

$usuarios = [];
try {   
$admin = new Admin ("jhoony", "jhoony@gmail.com");
$usuarios[] = $admin;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
try {
    $alumno = new Alumno ("maria", "maria@gmail.com", "897609");
   $usuarios[] = $alumno;
   } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

try {
        $usuarioError = new Alumno ("Error", "correoInvalido", "MatriculaInvalida");
        $usuarios[] = $usuarioError;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

echo "<h1>Lista de Usuarios validos</h1>";
echo "<table border='1'>";
echo "<tr>"; 
echo "<th>Nombre</th>";
echo "<th>Email</th>";
echo "<th> Rol </th>";
echo "<th> Matricula </th>";
echo "</tr>";
foreach ($usuarios as $usuario) {
    $extra = "--";
    if ($usuario instanceof Admin) {
        $extra =  $usuario->getRol();
    } elseif ($usuario instanceof Alumno) {
        $extra =  $usuario->getMatricula();
    } 
    echo "<tr>";
    echo "<td>" . $usuario->getNombre() . "</td>";
    echo "<td>" . $usuario->getEmail() . "</td>";
    echo "<td>" . $usuario->getRol() . "</td>";
    echo "<td>" . $extra . "</td>";
    echo "</tr>";
}
echo "</table>";
?>