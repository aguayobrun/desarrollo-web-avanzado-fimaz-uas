<?php
require_once __DIR__ .  '/template/header.php';

?>
<div class="mx-auto" style = "width:50%">
<div class="card text-center">
  <div class="card-header">
    MENU
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <div class="row mb-3">
        <div class="col">
            <div class="card-header">
        CREAR TORNEO
    </div>
    <div class="card-body">
        <a href="frmTorneos.php" class="btn btn-primary">
            <img src="../img/torneo-admin.png" alt="crear un torneo" width="180" height="180">
        </a>
    </div>
  </div>
        <div class="col">
            <div class="card-header">
        LISTADO DE TORNEO
    </div>
    <div class="card-body">
        <a href="readAllTorneos.php" class="btn btn-primary">
            <img src="../img/lista-torneos-admin.jpg" alt="lista torneo" width="180" height="180">
        </a>
    </div>
  </div>
        </div>

        <div class="row mb-3">
        <div class="col">
            <div class="card-header"> estadisticas</div>
  </div>
        <div class="col">
            <div class="card-header"> anuncios</div>
  </div>
        </div>
        
        </div>
    </div>
  <div class="card-footer text-body-secondary">
    configuracion de torneos
  </div>
</div>

</div>

<?php
require_once __DIR__ .  '/template/footer.php';
?>