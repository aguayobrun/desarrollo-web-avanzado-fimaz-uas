<?php
require_once __DIR__ . '/../../controller/torneoscontroller.php';
require_once __DIR__ . '/template/header.php';

$objTorneosController = new TorneoController();

//capturamos el id del torneo y sacar la info del torneo seleccionado
$id = $_GET['id'] ?? null;
if (!$id){
    header("Location: readAllTorneos.php");
    exit();
}
$lstTorneo = $objTorneosController -> readOneTorneo($id);
?>

<div class="mx-auto p-4">
    <div class="card">
    <div class="card-header">
     detalle en info del torneo
    </div>
    <div class="card-body">
      <form action = "torneosInsert.php" method = "post">
    
    <div class="label">
        <div class="mb-3">
            <label for="nombreTorneo" class="form-label">Nombre del Torneo (:id) <?= $lstTorneo['id'] ?> </label>
            <input type="text" class="form-control" id="nombreTorneo" name="txtnombreTorneo" 
            value = "<?= $lstTorneo['nombre_torneo'] ?>" readonly>
        </div>
        <div class="mb-3"><label for="organizador" class="form-label">Organizador</label>
            <input type="text" class="form-control" id="organizador" name="txtorganizador" 
            value = "<?= $lstTorneo['organizador'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="patrocinador" class="form-label">Patrocinador(es)</label>
            <textarea class="form-control" id="patrocinador" name="txtpatrocinador" cols = "30" rows = "2" readonly>
            <?= $lstTorneo['patrocinador'] ?>
            </textarea>
            <span id = "patrocinador-info" class="form-text">
                ATENCION: se puede separar con "," si hay mas de un patrocinador
            </span>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="mb-3">
             <label for="sede" class="form-label">Sede</label>
            <input type="text" class="form-control" id="sede" name="txtsede" value = "<?= $lstTorneo['sede'] ?>" readonly>
        </div>
            </div>
            <div class="col-12">
            <div class="mb-3">
             <label for="categoria" class="form-label">Categoría</label>
            <input list="lstCategorias" class="form-control" id="categoria" name="txtcategoria" 
            value = "<?= $lstTorneo['categoria'] ?>" readonly>
            <datalist id =  "lstCategorias">
                <option value="1ra fuerza">
                <option value="2da fuerza">
                <option value="veteranos">
                <option value = "Libre">
                <option value="juvenil">
                <option value="femenil">
                <option value = "Empresarial">
                <option value = "infantil">
                <option value="Minibasket">
            </datalist>
        </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                
            <label for="premio1" class="form-label">1re lugar</label>
            <input type="text" class="form-control" id="premio1" name="txtpremio1" 
            value = "<?= $lstTorneo['premio'] ?>" readonly>
        </div>
                
                <div class="col mb-3">
            
            <label for="premio2" class="form-label">2do lugar</label>
            <input type="text" class="form-control" id="premio2" name="txtpremio2" 
            value = "<?= $lstTorneo['premio2'] ?>" readonly>
        </div>
        <div class="col mb-3">
           
            <label for="premio3" class="form-label">Premio 3</label>
            <input type="text" class="form-control" id="premio3" name="txtpremio3" 
            value = "<?= $lstTorneo['premio3'] ?>" readonly>
        </div>
        <div class="col">
            
            <label for="otropremio" class="form-label">Otro Premio</label>
            <input type="text" class="form-control" id="otropremio" name="txtotroPremio" 
            value = "<?= $lstTorneo['otro_premio'] ?>" readonly>
        </div>
        </div>

        <div class="row">
                <div class="col mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="txtusuario" 
            value = "<?= $lstTorneo['usuario'] ?>" readonly>
        </div>
              <div class="col">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="txtcontraseña" 
            value = "<?= $lstTorneo['contraseña'] ?>" readonly>
              </div>  
            
                
            </div>
        </div>
        
        
        <div class="col-12">
            <a href="readAllTorneos.php" class="btn btn-success"> REGRESAR</a>
        </div>

    </div>

    </form>  
</div>
</div>

<div class = "card-footer text-body-secondary">
    FORMULARIO PARA REGISTRAR
</div>

<?php
require_once __DIR__ . ("/template/footer.php");
?>