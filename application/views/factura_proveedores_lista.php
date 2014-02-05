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
<div id="facturas_proveedor_lista">
	<div>
		<a href="<?php base_url()?>cargarxml" class="btn btn-info">Alta Proveedor</a>
	</div>
	<table class="table table-striped">
		<tr><th># Interno</th><th>Empresa</th><th>Total</th><th>PDF</th><th>XML</th><th>Fecha</th></tr>
		<?php foreach($facturas as $factura){?>
			<tr>
				<td><?php echo $factura['id_factura'];?></td>
				<td><?php echo $factura['nombre']?></td>
				<td>$<?php echo $factura['total'];?></td>
				<td><?php if($factura['pdf']==0){echo '<a href="'.base_url().'archivo/cargarpdf/'.$factura['id_factura'].'" class="btn btn-danger"><span class="glyphicon glyphicon-upload"></span></a>';}else{ echo '<a href="'.base_url().'archivo/descargarpdf/'.$factura['id_factura'].'" class="btn btn-success"><span class="glyphicon glyphicon-save"></span></a>';}?></td>
				<td><a href="<?php echo base_url();?>archivo/descargarxml/<?php echo $factura['id_factura']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-save"></span></a></td>
				<td><?php echo $factura['fecha'];?></td>
			</tr>
		<?php } ?>
	</table>
</div>