<?php
require_once __DIR__ . '/../../controller/torneoscontroller.php';
require_once __DIR__ . '/template/header.php';

$objTorneosController = new TorneoController();

$rows = $objTorneosController -> readTorneos();

?>

<div class="card-text-center">
  <div class="card-header">
    <span class = "fa-solid fa-trophy">Listado de torneos </span>
  </div>
  <div class="card-body">
    <table class = "table table-hover table-border">
        <thead class = "table-light">
            <tr>
                <th scope = "col">ID</th>
                <th scope = "col">TORNEO</th>
                <th scope = "col">ORGANIZADOR</th>
                <th scope = "col">ACCIONES </th>
                </tr>
        </thead>
        <tbody>
            <?php
            if ($rows) : ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <th>  <?= $row['id'] ?> </th>
                    <th> <?= $row['nombre_torneo'] ?></th>   
                    <th> <?= $row['organizador'] ?></th>
                    <th>
                       
                        <a href="readOneTorneo.php?id=<?= $row['id'] ?>" class = "btn btn-primary">
                             <span class="fa-solid fa-list-check"></span>
                        </a>
                        <a href="updateTorneo.php?id=<?= $row['id'] ?>" class = "btn btn-success">
                            <span class="fa-solid fa-pen-to-square"></span>
                        </a>

                        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#idModal<?= $row['id'] ?>">
    <span class="fa-solid fa-trash"></span>
</button>

<!-- Modal -->
<div class="modal fade" id="idModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="idmModal<?= $row['id'] ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="idModal<?= $row['id'] ?>">¿desea eliminar el torneo?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Esta accion no se desace, esta seguro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="deleteTorneo.php?id=<?= $row['id'] ?>" class = "btn btn-danger">Eliminar</a>
      </div>
    </div>
  </div>
</div>
                        
                    </th>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class = "text-center"> No hay torneos/registros aun</td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>
    <div class = "mx-auto p-2">
      <a href="admin.php" class ="btn btn-primary"> regresar</a>  
    </div>

</div>

<?php
require_once __DIR__ . '/template/footer.php';
?>