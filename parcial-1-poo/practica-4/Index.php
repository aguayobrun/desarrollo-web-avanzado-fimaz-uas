<?php
require_once 'Clases/Admin.php';
require_once 'Clases/Alumno.php';
require_once 'Clases/Invitado.php';
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
    $invitado = new Invitado ("juan", "juan@gmail.com", "Empresa S.A.");
    $usuarios[] = $invitado;
}
 catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
try {
        $usuarioError = new Invitado ("Error", "correoInvalido", "empresa no encontrada");
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
echo "<th> Matricula/Empresa </th>";
echo "</tr>";
foreach ($usuarios as $usuario) {
    $extra = "--";
    if ($usuario instanceof Admin) {
        $extra =  $usuario->getRol();
    } elseif ($usuario instanceof Alumno) {
        $extra =  $usuario->getMatricula();
    } elseif ($usuario instanceof Invitado) {
        $extra = $usuario->getEmpresa();
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