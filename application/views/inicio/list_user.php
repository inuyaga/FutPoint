<div class="container">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Admin</th>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($users->result() as $key) { ?>
  	<tr>
      <th scope="row"><?= $key->us_id ?></th>
      <td><?= $key->us_nombre ?></td>
      <td><?= $key->us_correo ?></td>
      <td><?= $key->us_telefono ?></td>
      
      	<?php if ($this->session->user['us_is_superuser'] == 1) {
      			echo "<td>SI</td>";
      			echo '<td><a class="btn btn-primary" href="'.base_url('welcome/UserUpdate/'.$key->us_id).'" role="button">Editar</a> 
      					  <a class="btn btn-primary" href="'.base_url('welcome/Confirmacion/'.$key->us_id).'" role="button">Eliminar</a></td>';
      		}else{
      			echo "<td>NO</td>";
      		}
      	?>
    </tr>
  	<?php } ?>
    
  </tbody>
</table>
</div>