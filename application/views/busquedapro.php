<div>
	<form method="POST" action="">
		<select>
			<?php foreach($lprovedores as $proveedor){ ?>
				<option value="<?php echo $proveedor['id']?>"><?php echo $proveedor['nombre']?></option>
			<?php } ?>
		</select>
	</form>
</div>