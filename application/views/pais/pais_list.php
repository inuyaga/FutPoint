<div class="container">
	<div class="row">
		<?php if ($this->session->user['us_is_superuser'] == 1 ) { ?>
		<a class="btn btn-primary" href="<?= base_url() ?>welcome/PaisCreate" role="button">Añadir</a>	
		<?php } ?>
		
	</div>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  		foreach ($paises->result() as $key) { ?>
  		<tr>
	      <th scope="row"><?= $key->pais_id ?></th>
	      <td><?= $key->pais_nombre ?></td>
	      <td>
	      	<?php if ($this->session->user['us_is_superuser'] == 1 ) { ?>
			<a class="btn btn-primary" href="<?= base_url() ?>welcome/PaisUpdate/<?= $key->pais_id ?>" role="button">Editar</a>
	      	<a class="btn btn-primary" href="<?= base_url() ?>welcome/PaisDelete/<?= $key->pais_id ?>" role="button">Eliminar</a>
			<?php } ?>
	      	
	      </td>
	    </tr>	
  		<?php }
  	 ?>
    
  </tbody>
</table>
</div>