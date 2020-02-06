<div class="container">
<form action="" method="POST"> 
  <div class="form-group">
    <label for="pais_nombre">Nombre</label>
    <input type="text" class="form-control" id="pais_nombre" name="pais_nombre" placeholder="Nombre del pais" value="<?php if(isset($obj)){echo $obj[0]->pais_nombre;} ?>">
  </div>
  <button type="submit" class="btn btn-danger">Guardar</button>
  
</form>
</div>