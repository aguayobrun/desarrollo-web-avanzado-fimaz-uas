<?php
require_once __DIR__ . '/template/header.php';

?>


<div class="mx-auto p-5">
<div class="card">
    <div class="card-header">
        <span class = "fa-solid fa-trophy">captura info del torneo </span>
        
    </div>
    <div class="card-body">
      <form action = "torneosInsert.php" method = "post">
    
    <div class="label">
        <div class="mb-3">
            <label for="nombreTorneo" class="form-label">Nombre del Torneo</label>
            <input type="text" class="form-control" id="nombreTorneo" name="txtnombreTorneo" required>
        </div>
        <div class="mb-3"><label for="organizador" class="form-label">Organizador</label>
            <input type="text" class="form-control" id="organizador" name="txtorganizador" required>
        </div>
        <div class="mb-3">
            <label for="patrocinador" class="form-label">Patrocinador(es)</label>
            <textarea class="form-control" id="patrocinador" name="txtpatrocinador" cols = "30" rows = "2" required></textarea>
            <span id = "patrocinador-info" class="form-text">
                ATENCION: se puede separar con "," si hay mas de un patrocinador
            </span>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="mb-3">
             <label for="sede" class="form-label">Sede</label>
            <input type="text" class="form-control" id="sede" name="txtsede" required>
        </div>
            </div>
            <div class="col-12">
            <div class="mb-3">
             <label for="categoria" class="form-label">Categoría</label>
            <input list="lstCategorias" class="form-control" id="categoria" name="txtcategoria" required>
            <datalist id =  "lstCategorias">
                <option value="1ra fuerza">
                <option value="2da fuerza">
                <option value="Veteranos">
                <option value = "Libre">
                <option value="Juvenil">
                <option value="Femenil">
                <option value = "Empresarial">
                <option value = "Infantil">
                <option value="Minibasket">
            </datalist>
        </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <div class="mb-3">
            <label for="premio1" class="form-label">1re lugar</label>
            <input type="text" class="form-control" id="premio1" name="txtpremio1" required>
        </div>
                </div>
                <div class="col mb-3">
            <div class="mb-3">
            <label for="premio2" class="form-label">2do lugar</label>
            <input type="text" class="form-control" id="premio2" name="txtpremio2" required>
        </div>
        <div class="col mb-3">
            <div class="mb-3">
            <label for="premio3" class="form-label">Premio 3</label>
            <input type="text" class="form-control" id="premio3" name="txtpremio3" required>
        </div>
        <div class="col">
            <div class="mb-3">
            <label for="otropremio" class="form-label">Otro Premio</label>
            <input type="text" class="form-control" id="otropremio" name="txtotroPremio" required>
        </div>
        </div>
        <div class="row">
                <div class="col mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="txtusuario" required>
        </div>
              <div class="col">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="txtcontraseña" required>
              </div>  
            
                
            </div>
        </div>
        
        <div class="col mb-3">
            <button type="submit" class="btn btn-primary" name="btnGuardar">Guardar Torneo</button>
            <a href="admin.php" class = "btn btn-primary">Cancelar</a>
        </div>
        
        
    </div>

    </form>  
</div>

<div class="card-footer text-body-secondary">
formulario para registrar torneos
</div>
</div>
</div>

<?php
require_once __DIR__ . '/template/footer.php';

?>