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
		<div id="factura_datos">
			<div class="span8" align="left">
				<h4>Datos de Factura</h4>
			</div>
			<div class="span8" align="left">
				<div class="span8"><b># Certificado:</b> <?php echo $factura['nocertificado']?></div>
				<div class="span3"><b>Fecha:</b> <?php echo $factura['fecha']?></div>
				<div class="span3"><b>Hora:</b> <?php echo $factura['hora']?></div>
				<div class="span3"><b>Folio:</b> <?php echo $factura['folio']?></div>
				<div class="span8"><b>Lugar Expedicion:</b> <?php echo $factura['lugar_expedicion']?></div>
				<div class="span3"><b>Moneda:</b> <?php echo $factura['moneda']?></div>
				<div class="span3"><b># Cuenta:</b> <?php echo $factura['numctapago']?></div>
				<div class="span3"><b>Condiciones Pago:</b> <?php echo $factura['condicionespago']?></div>
				<div class="span3"><b>Metodo Pago:</b> <?php echo $factura['metodopago']?></div>

			</div>

			<div class="span8" align="left">
				<h4>Detalles Factura</h4>
				<table class="table table-striped">
					<tr>
						<th>Cantidad</th>
						<th>Unidad - Descripcion</th>
						<th>Precio Unitario</th>
						<th>Importe</th>
					</tr>
					<?php foreach($detalles as $detalle){?>
					<tr>
						<td><?php echo $detalle['cantidad']?></td>
						<td><?php echo $detalle['unidad']?> - <?php echo $detalle['descripcion']?></td>
						<td><?php echo $detalle['punitario']?></td>
						<td>$<?php echo $detalle['importe']?></td>
					</tr>
					<?php }?>

				</table>
			</div>
		</div>
	</div>
</div>
