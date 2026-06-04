<?php
namespace Controllers;
use Models\ProductoModel;

class PublicController {
    public function catalogo() : void {
        $termino = trim($_GET['buscar'] ?? '');
        $productoModel = new ProductoModel();
        $productos = $productoModel -> buscarPublico($termino);
        require_once __DIR__ . '/../views/public/catalogo.php';
    }
}
/* esta clase `PublicController` pertenece al namespace `Controllers` y contiene un método
`catalogo` que recupera productos basados en un término de búsqueda y renderiza una vista. */
?>