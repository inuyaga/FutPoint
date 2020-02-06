<div class="container">
<form action="<?= base_url() ?>/Welcome/login" method="POST"> 
  <div class="form-group">
    <label for="in_correo">Correo</label>
    <input type="email" class="form-control" id="in_correo" name="in_correo" placeholder="Ingrese su email">
    <small id="in_correo" class="form-text text-muted">.</small>
  </div>
  <div class="form-group">
    <label for="in_pass">Password</label>
    <input type="password" class="form-control" id="in_pass" name="in_pass" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
</div>