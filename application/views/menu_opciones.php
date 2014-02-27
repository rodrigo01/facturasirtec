<div id="menutop">
	<ul class="menu_opciones">
		<li><a href="<?php echo base_url();?>" class="btn btn-yellow">Inicio</a></li>
		<li><a href="<?php echo base_url();?>factura/cargarxml" class="btn btn-green">Subir Archivos</a></li>
		<li><a href="<?php echo base_url();?>factura/proveedores" class="btn btn-blue">Facturas Proveedores</a></li>
		<li><a href="<?php echo base_url();?>factura/emitidas" class="btn btn-yellow">Facturas Clientes</a></li>
		<li>
			<div class="btn-group">
			  <button type="button" class="btn btn-green dropdown-toggle" style="height: 40px; margin-top: 5px;" data-toggle="dropdown">
			    Busqueda <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="#">Cliente y Fecha</a></li>
			    <li><a href="#">Proveedor y Fecha</a></li>
			  </ul>
			</div>
		</li>
		<li><a href="<?php echo base_url();?>login/logout" class="btn btn-blue">Salir de Intranet</a></li>
	</ul>
</div>


<script>
$('.dropdown').dropdown()
</script>