<div class="container">
	<div class="row">
		<?php if ($this->session->user['us_is_superuser'] == 1) {?>
		<a class="btn btn-primary" href="<?=base_url()?>welcome/PartidoAdd" role="button">Añadir</a>
		<?php }?>

	</div>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pais</th>
      <th scope="col">Vs</th>
      <th scope="col">Pais</th>
      <th scope="col">Status</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
  	<?php
foreach ($partidos->result() as $key) {
    ?>
  		<tr>
	      <th scope="row"><?=$key->pt_id?></th>
	      <td><?=$key->pais_uno_nombre?> = <?=$key->pt_pais_uno_anotacion?>
	      <?php if ($this->session->user['us_is_superuser'] == 1): ?>
	      	<?php if ($key->pt_status != 2): ?>
	      		<button type="button" onclick="addGol(<?=$key->pt_id?>, 1, '+')" class="btn btn-success">+</button>
	        <button type="button" onclick="addGol(<?=$key->pt_id?>, 1, '-')" class="btn btn-danger">-</button>
	      	<?php endif?>
	      <?php endif?>

	   	  </td>
	      <td>VS</td>

	      <td><?=$key->pais_udos_nombre?> = <?=$key->pt_pais_dos_anotacion?>
	      <?php if ($this->session->user['us_is_superuser'] == 1): ?>
	      	<?php if ($key->pt_status != 2): ?>
	      		<button type="button" onclick="addGol(<?=$key->pt_id?>, 2, '+')" class="btn btn-success">+</button>
	        	<button type="button" onclick="addGol(<?=$key->pt_id?>, 3, '-')" class="btn btn-danger">-</button>
	      	<?php endif?>
	      <?php endif?>

	  	  </td>

	      <td>
	      	<?php
if ($key->pt_status == 0) {?>
	      		<h6>En Proceso</h6>
	      <?php	} else {
        echo '<h6>Finalizado</h6>';
    }
    ?>
	      </td>
	      <td><?=$key->pt_date?></td>
	      <td>
	      	<!-- <?php if ($this->session->user['us_is_superuser'] == 1) {?>
			<a class="btn btn-primary" href="<?=base_url()?>welcome/PaisUpdate/<?=$key->pt_id?>" role="button">Editar</a>
	      	<a class="btn btn-primary" href="<?=base_url()?>welcome/PaisDelete/<?=$key->pt_id?>" role="button">Eliminar</a>
			<?php }?> -->

	      </td>
	      <td>
	      	<?php if ($this->session->user['us_is_superuser'] == 1): ?>
	      		<button type="button" onclick="Finalizar(<?=$key->pt_id?>)" class="btn btn-success">Finalizar</button>
	      	<?php endif?>

	      </td>
	    </tr>
  		<?php }
?>

  </tbody>
</table>
</div>

