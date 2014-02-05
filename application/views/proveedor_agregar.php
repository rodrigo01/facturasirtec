<div class="container">
<div class="well span8">
                            	
<form name="frmPrincipal" id="frmPrincipal" method="post" action="<?php echo base_url();?>proveedor/insert">
		
    <div class="span8" align="left">                  
      <h4>Datos de la empresa</h4>
    </div>
    	
        <div class="span8">

            <div class="span3">
                <label>Nombre</label>
                <input type="text" name="proveedor[nombre]" id="txtTelefonocontacto" class="form-control" value="">
            </div>
            
            <div class="span3">
            	<label>RFC</label>
                <input type="text" name="proveedor[rfc]" id="txtRfc" value="" class="form-control">
            </div>
       </div>
       
       <div class="span8" align="left">
       		<h4>Domicilio físcal</h4>
			</div>
        
        <div class="span8">
            <div class="span3">
                <label>Calle</label>
                <input type="text" name="proveedor[calle]" id="txtCalle" class="form-control" value="" >
            </div>
            
            <div class="span1">
            	<label>No Ext</label>
                <input type="text" name="proveedor[noexterior]" id="txtNext" class="form-control" value="">
    		</div>
                                        
            <div class="span1">
               <label>No Int</label>
               <input type="text" name="proveedor[nointerior]" id="txtNint" class="form-control"  value="">
            </div>
            
            <div class="span3">
               <label>Colonia</label>
                <input type="text" name="proveedor[colonia]" class="form-control"  class="form-control" >
            </div>
            
            <div class="span3">
                <label>C.P.</label>
                <input type="text" name="proveedor[cp]" id="txtCp" class="form-control"  value="">
            </div>
            
            <div class="span3">
                <label>Localidad</label>
                <input type="text" name="proveedor[localidad]" id="txtLocalidad" class="form-control"  value="">
            </div>
            
            <div class="span3">
                <label>Municipio</label>
                <input type="text" name="proveedor[municipio]" id="txtMunicipio" class="form-control"  value="">
            </div>
            
            <div class="span3">
            	<label>Estado</label>
                    <select name="proveedor[estado]" id="cmbEstado" class="form-control">
                    <option value="0"></option>
                    <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                    <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option> 
                    <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option> 
                    <option value="CAMPECHE">CAMPECHE</option> 
                    <option value="COAHUILA">COAHUILA</option> 
                    <option value="COLIMA">COLIMA</option> 
                    <option value="CHIAPAS">CHIAPAS</option> 
                    <option value="CHIHUAHUA">CHIHUAHUA</option> 
                    <option value="D.F.">D.F.</option> 
                    <option value="DURANGO">DURANGO</option> 
                    <option value="EDO DE MÉXICO">EDO DE MÉXICO</option> 
                    <option value="GUANAJUATO">GUANAJUATO</option> 
                    <option value="GUERRERO">GUERRERO</option> 
                    <option value="HIDALGO">HIDALGO</option> 
                    <option value="JALISCO">JALISCO</option> 
                    <option value="MICHOACÁN">MICHOACÁN</option> 
                    <option value="MORELOS">MORELOS</option> 
                    <option value="NAYARIT">NAYARIT</option> 
                    <option value="NUEVO LEÓN">NUEVO LEÓN</option> 
                    <option value="OAXACA">OAXACA</option> 
                    <option value="PUEBLA">PUEBLA</option> 
                    <option value="QUERÉTARO">QUERÉTARO</option> 
                    <option value="QUINTANA ROO">Quintana Roo</option> 
                    <option value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option> 
                    <option value="SINALOA">SINALOA</option> 
                    <option value="SONORA">SONORA</option> 
                    <option value="TABASCO">TABASCO</option> 
                    <option value="TAMAULIPAS">TAMAULIPAS</option> 
                    <option value="TLAXCALA">TLAXCALA</option> 
                    <option value="VERACRUZ">VERACRUZ</option> 
                    <option value="YUCATÁN">YUCATÁN</option> 
                    <option value="ZACATECAS">ZACATECAS</option>
                    <option value="OTRO">OTRO</option>     
                </select>
                
        	</div>
            
            <div class="span3">
            	<label>País</label>
            	<input type="text" name="proveedor[pais]" id="txtPais" class="form-control"  value="MÉXICO">
            </div>
            
			</div>
                <div class="span8" align="left">                  
               <h4>Contacto</h4>
             </div>
            
        <div class="span8">
        	
            
            <div class="span3">
                <label>Teléfono</label>
            	<input type="text" name="proveedor[telefono]" id="txtTelefonocontacto" class="form-control" value="">
            </div>
            
            <div class="spanf" align="right">
                <a href="<? echo base_url();?>proveedor" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
    		</div>
      </div>
            
</form></div>
</div>