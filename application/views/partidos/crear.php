<div class="container">
<form action="" method="POST"> 
  <div class="form-group">
    <label for="pt_date_f">Fecha</label>
    <input type="date" class="form-control" id="pt_date_f" name="pt_date_f">
  </div>

  <div class="form-group">
    <label for="pt_date_h">Hora</label>
    <input type="time" class="form-control" id="pt_date_h" name="pt_date_h">
  </div>


   <div class="form-group">
    <label for="pt_status">Example select</label>
    <select class="form-control" id="pt_status" name="pt_status">
      <option value="0">En Proceso</option>
      <option value="1">Finalizado</option>
    </select>
  </div>

<div class="row">
<div class="col-sm-5">
	<div class="form-group">
    <label for="pt_pais_uno_id">Equipo 1</label>
    <select class="form-control" id="pt_pais_uno_id" name="pt_pais_uno_id">
    	<?php foreach ($paises->result() as $key) { ?>
    		<option value="<?= $key->pais_id ?>"><?= $key->pais_nombre ?></option>
    	<?php } ?>
    </select>
  </div>
</div>

<div class="col-sm-2">
	<br>
	<h1 class="text-center">VS</h1>
</div>

<div class="col-sm-5">
	  <div class="form-group">
    <label for="pt_pais_dos_id">Equipo 2</label>
    <select class="form-control" id="pt_pais_dos_id" name="pt_pais_dos_id">
    	<?php foreach ($paises->result() as $key) { ?>
    		<option value="<?= $key->pais_id ?>"><?= $key->pais_nombre ?></option>
    	<?php } ?>
    </select>
  </div>
</div>
</div>
  




  <button type="submit" class="btn btn-danger">Guardar</button>
  
</form>
</div>