<div class="container">
<form action="<?= base_url() ?>Welcome/user_update/<?= $user[0]->us_id ?>" method="POST"> 
  <div class="form-group">
    <label for="in_correo">Correo</label>
    <input type="email" class="form-control" id="in_correo" name="in_correo" placeholder="Ingrese su email" value="<?= $user[0]->us_correo ?>">
    <small id="in_correo" class="form-text text-muted">.</small>
  </div>
  <div class="form-group">
    <label for="in_pass">Password</label>
    <input type="password" class="form-control" id="in_pass" name="in_pass" placeholder="Password" required>
  </div>

  <div class="form-group">
    <label for="in_nombre">Nombre</label>
    <input type="text" class="form-control" id="in_nombre" name="in_nombre" placeholder="Nombre completo" value="<?= $user[0]->us_nombre ?>">
  </div>

  <div class="form-group">
    <label for="in_telefono">Telefono</label>
    <input type="number" class="form-control" id="in_telefono" name="in_telefono" placeholder="Telefono celular" value="<?= $user[0]->us_telefono ?>">
  </div>


  <div class="form-group">
    <label for="in_direccion">Direccion</label>
    <input type="text" class="form-control" id="in_direccion" name="in_direccion" placeholder="Direccion" value="<?= $user[0]->us_direccion ?>">
  </div>


  <div class="form-group">
    <label for="tip_user">Tipo de usuario</label>
    <select class="form-control" id="tip_user" name="tip_user">
      <option value="1" <?php if ($user[0]->us_is_superuser == 1) {echo "selected";} ?> >Administrador</option>
      <option value="0" <?php if ($user[0]->us_is_superuser == 0) {echo "selected";} ?>>Usuario Normar</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</div>