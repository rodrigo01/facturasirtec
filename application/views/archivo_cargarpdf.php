<div class="container">
	<div class="well span8">                         
		<form name="frmPrincipal" id="frmPrincipal" method="post" action="<?php echo base_url();?>archivo/loadpdf" enctype="multipart/form-data">

			<div id="informacion_proveedor">
				<div class="span8" align="left">                  
			      <h4>Datos de la empresa</h4>
			    </div>
					<p>
						<?php echo $proveedor['nombre']?><br>
						<?php echo $proveedor['calle'].' '.$proveedor['noexterior'].' '.$proveedor['colonia']?><br>
						C.P. <?php echo $proveedor['cp'].' '.$proveedor['localidad'].' '.$proveedor['estado']?><br>
						<?php echo $proveedor['rfc']?><br>
						<?php echo $proveedor['telefono']?>
					</p>
			</div>
			<div id="datos_factura" class="bs-callout bs-callout-warning spanf">
				<div class="span8" align="left">                  
			      <h4>Datos de Factura</h4>
			    </div>
			    <div class="span8">
					<input type="hidden" name="factura[id_factura]"  value="<? echo $factura['id_factura'];?>">

					<div class="span3">
						<label>No Certificado	:</label>
						<?php echo $factura['nocertificado']?>
					</div>

					<div class="span3">
						<label>Serie:</label>
						<?php echo $factura['serie']?>
					</div>

					<div class="span3">
						<label>Total:</label>
						<?php echo $factura['total']?>
					</div>
	        	</div>
	        	<div class="span8" align="left">                  
			      <h4>Cargar PDF</h4>
			      <input type="file" name="archpdf">
			    </div>
			    <div class="spanf" align="right">
	                <a href="<? echo base_url();?>factura/proveedores" class="btn btn-default">Cancelar</a>
	                <button type="submit" class="btn btn-primary">Subir Archivo</button>
            	</div>
       </div>
		</form>
	</div>
</div>