<div class="container">
	<div class="well span8">
		<div id="proveedor_ver">
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
		</div>
	</div>
</div>