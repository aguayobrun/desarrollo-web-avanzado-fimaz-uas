<?php require_once __DIR__ . '/../layouts/header.php'?>

<h2> Editar producto</h2>

<form action="index.php?route=productos/update" method = "POST">
<input type="hidden" name ="id" value = "<?=(int) $producto['id']; ?>">

<div class = "mb-3">
<label for="form-label"> SKU</label>
<input type="text" name ="sku" value = "<?= htmlspecialchars ($producto['sku']); ?>" required>
</div>
<div class = "mb-3">
<label for="form-label"> Nombre</label>
<input type="text" name ="nombre" value = "<?= htmlspecialchars ($producto['nombre']); ?>" required>
</div>
<div class = "mb-3">
<label for="form-label"> Descripcion</label>
<textarea name ="descripcion" class = "form-control" required> <?= htmlspecialchars ($producto['descripcion']); ?> </textarea>
</div>

<div class = "mb-3">
<label for="form-label"> Precio Compra</label>
<input type="number" step = "0.01" name ="precio_compra" 
value = "<?= htmlspecialchars ((string)$producto['precio_compra']); ?>" required>
</div>

<div class = "mb-3">
<label for="form-label"> Precio Venta</label>
<input type="number" step = "0.01" name ="precio_venta" 
value = "<?= htmlspecialchars ((string)$producto['precio_venta']); ?>" required>
</div>

<div class = "mb-3">
<label for="form-label"> Existencia</label>
<input type="text" name ="existencia" value = "<?= (int) ($producto['existencia']); ?>" required>
</div>
<button type= "submit" class = "btn btn-primary"> ACTUALIZAR</button>
<a href="index.php?route=productos" class = "btn btn-secondary"> CANCELAR</a>
</form>

<?php require_once __DIR__ . '/../layouts/footer.php'?>