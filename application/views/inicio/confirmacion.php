<div class="container">
<form action="" method="POST"> 
  <div class="alert alert-danger" role="alert">
  Esta seguro de eliminar
</div>

<input type="hidden" name="id" value="<?= $user ?>">
  
  <button type="submit" class="btn btn-danger">Si</button>
  <a class="btn btn-secondary" href="#" onClick="javascript:history.go(-1);" role="button">Cancelar</a>
</form>
</div>