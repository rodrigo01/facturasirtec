<?php
	$info = $this->session->flashdata('info');
	if(is_array($info))
	{ 
		foreach($info as $alert){
			?>
			<div class="alert alert-<?php echo $alert['tipo']?>"><?php echo $alert['mensaje']?></div>
			<?
		}
	}
?>
<div id="proveedor_lista">
	<a href="<?php echo base_url()?>proveedor/crear" class="btn btn-success">Agregar Proveedor</a>
	<table class="table table-striped">
		<tr><th>Nombre</th><th>RFC</th><th>Opciones</th></tr>
		<?php foreach($proveedores as $proveedor){?>
			<tr>
				<td><a href="<?php echo base_url();?>proveedor/ver/<?php echo $proveedor['id_proveedor'];?>"><?php echo $proveedor['nombre']?></a></td>
				<td><?php echo $proveedor['rfc'];?></td>
				<td><a href="<?php echo base_url();?>proveedor/editar/<?php echo $proveedor['id_proveedor'];?>" class="btn btn-info">Editar</a></td>
			</tr>
		<?php } ?>
	</table>
</div>