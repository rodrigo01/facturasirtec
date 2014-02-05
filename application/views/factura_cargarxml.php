<div id="cargar_xml">
	<form method="post" action="<?php echo base_url()?>factura/load" enctype="multipart/form-data">
		<h3>Cargue los archivos correspondientes</h3>
		<div>
			<h4>Archivo XML*</h4>
			<input type="file" name="archxml">

			<h4>Archivo PDF</h4>
			<input type="file" name="archpdf">
			<input type="submit" value="Cargar Archivos" class="btn btn-success">
		</div>
	</form>
</div>