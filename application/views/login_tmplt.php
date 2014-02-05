			<div id="form_login">
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
				<form action="<?php echo base_url();?>login/check" method="post">
					<h2>Iniciar Session</h2>
					<table class="table">
						<tr>
							<td>Usuario:</td>
							<td><input name="username" type="text" class="form-control"></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input name="password" type="password" class="form-control"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-success" value="Iniciar"></td>
						</tr>
					</table>
				</form>
			</div>
