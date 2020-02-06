<div class="container">
<form action="<?=base_url()?>/Welcome/nuevo_user" method="POST">
  <div class="form-group">
    <label for="in_correo">Correo</label>
    <input type="email" class="form-control" id="in_correo" name="in_correo" placeholder="Ingrese su email">
    <small id="in_correo" class="form-text text-muted">.</small>
  </div>
  <div class="form-group">
    <label for="in_pass">Password</label>
    <input type="password" class="form-control" id="in_pass" name="in_pass" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="in_nombre">Nombre</label>
    <input type="text" class="form-control" id="in_nombre" name="in_nombre" placeholder="Nombre completo">
  </div>

  <div class="form-group">
    <label for="in_telefono">Telefono</label>
    <input type="number" class="form-control" id="in_telefono"  name="in_telefono" placeholder="Telefono celular">
  </div>


  <div class="form-group">
    <label for="in_direccion">Direccion</label>
    <input type="text" class="form-control" id="in_direccion" name="in_direccion" placeholder="Direccion">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>