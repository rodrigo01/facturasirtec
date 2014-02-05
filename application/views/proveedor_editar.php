<div class="container">
<div class="well span8">
                                
<form name="frmPrincipal" id="frmPrincipal" method="post" action="<?php echo base_url();?>proveedor/update">
        
    <div class="span8" align="left">                  
      <h4>Datos de la empresa</h4>
    </div>
        
        <div class="span8">
             <input type="hidden" name="proveedor[id_proveedor]"  value="<? echo $proveedor['id_proveedor'];?>">
            <div class="span3">
                <label>Nombre</label>
                <input type="text" name="proveedor[nombre]" id="txtTelefonocontacto" class="form-control" value="<? echo $proveedor['nombre'];?>">
            </div>
            
            <div class="span3">
                <label>RFC</label>
                <input type="text" name="proveedor[rfc]" id="txtRfc" value="<? echo $proveedor['rfc'];?>" class="form-control">
            </div>
       </div>
       
       <div class="span8" align="left">
            <h4>Domicilio físcal</h4>
            </div>
        
        <div class="span8">
            <div class="span3">
                <label>Calle</label>
                <input type="text" name="proveedor[calle]" id="txtCalle" class="form-control" value="<? echo $proveedor['calle'];?>" >
            </div>
            
            <div class="span1">
                <label>No Ext</label>
                <input type="text" name="proveedor[noexterior]" id="txtNext" class="form-control" value="<? echo $proveedor['noexterior'];?>">
            </div>
                                        
            <div class="span1">
               <label>No Int</label>
               <input type="text" name="proveedor[nointerior]" id="txtNint" class="form-control"  value="<? echo $proveedor['nointerior'];?>">
            </div>
            
            <div class="span3">
               <label>Colonia</label>
                <input type="text" name="proveedor[colonia]" class="form-control"  class="form-control" value="<? echo $proveedor['colonia'];?>" >
            </div>
            
            <div class="span3">
                <label>C.P.</label>
                <input type="text" name="proveedor[cp]" id="txtCp" class="form-control"  value="<? echo $proveedor['cp'];?>">
            </div>
            
            <div class="span3">
                <label>Localidad</label>
                <input type="text" name="proveedor[localidad]" id="txtLocalidad" class="form-control"  value="<? echo $proveedor['localidad'];?>">
            </div>
            
            <div class="span3">
                <label>Municipio</label>
                <input type="text" name="proveedor[municipio]" id="txtMunicipio" class="form-control"  value="<? echo $proveedor['municipio'];?>">
            </div>
            
            <div class="span3">
                <label>Estado</label>
                    <select name="proveedor[estado]" id="cmbEstado" class="form-control">
                    <option <?php if($proveedor['estado']=='AGUASCALIENTES')echo 'Selected';?>  value="AGUASCALIENTES">AGUASCALIENTES</option>
                    <option <?php if($proveedor['estado']=='BAJA CALIFORNIA')echo 'Selected';?> value="BAJA CALIFORNIA">BAJA CALIFORNIA</option> 
                    <option <?php if($proveedor['estado']=='BAJA CALIFORNIA SUR')echo 'Selected';?> value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option> 
                    <option <?php if($proveedor['estado']=='CAMPECHE')echo 'Selected';?> value="CAMPECHE">CAMPECHE</option> 
                    <option <?php if($proveedor['estado']=='COAHUILA')echo 'Selected';?> value="COAHUILA">COAHUILA</option> 
                    <option <?php if($proveedor['estado']=='COLIMA')echo 'Selected';?> value="COLIMA">COLIMA</option> 
                    <option <?php if($proveedor['estado']=='CHIAPAS')echo 'Selected';?> value="CHIAPAS">CHIAPAS</option> 
                    <option <?php if($proveedor['estado']=='CHIHUAHUA')echo 'Selected';?> value="CHIHUAHUA">CHIHUAHUA</option> 
                    <option <?php if($proveedor['estado']=='D.F.')echo 'Selected';?> value="D.F.">D.F.</option> 
                    <option <?php if($proveedor['estado']=='DURANGO')echo 'Selected';?> value="DURANGO">DURANGO</option> 
                    <option <?php if($proveedor['estado']=='EDO DE MÉXICO')echo 'Selected';?> value="EDO DE MÉXICO">EDO DE MÉXICO</option> 
                    <option <?php if($proveedor['estado']=='GUANAJUATO')echo 'Selected';?> value="GUANAJUATO">GUANAJUATO</option> 
                    <option <?php if($proveedor['estado']=='GUERRERO')echo 'Selected';?> value="GUERRERO">GUERRERO</option> 
                    <option <?php if($proveedor['estado']=='HIDALGO')echo 'Selected';?>  value="HIDALGO">HIDALGO</option> 
                    <option <?php if($proveedor['estado']=='JALISCO')echo 'Selected';?> value="JALISCO">JALISCO</option> 
                    <option <?php if($proveedor['estado']=='MICHOACÁN')echo 'Selected';?> value="MICHOACÁN">MICHOACÁN</option> 
                    <option <?php if($proveedor['estado']=='MORELOS')echo 'Selected';?> value="MORELOS">MORELOS</option> 
                    <option <?php if($proveedor['estado']=='NAYARIT')echo 'Selected';?> value="NAYARIT">NAYARIT</option> 
                    <option <?php if($proveedor['estado']=='NUEVO LEÓN')echo 'Selected';?> value="NUEVO LEÓN">NUEVO LEÓN</option> 
                    <option <?php if($proveedor['estado']=='OAXACA')echo 'Selected';?> value="OAXACA">OAXACA</option> 
                    <option <?php if($proveedor['estado']=='PUEBLA')echo 'Selected';?> value="PUEBLA">PUEBLA</option> 
                    <option <?php if($proveedor['estado']=='QUERÉTARO')echo 'Selected';?> value="QUERÉTARO">QUERÉTARO</option> 
                    <option <?php if($proveedor['estado']=='QUINTANA ROO')echo 'Selected';?> value="QUINTANA ROO">Quintana Roo</option> 
                    <option <?php if($proveedor['estado']=='SAN LUIS POTOSÍ')echo 'Selected';?> value="SAN LUIS POTOSÍ">SAN LUIS POTOSÍ</option> 
                    <option <?php if($proveedor['estado']=='SINALOA')echo 'Selected';?> value="SINALOA">SINALOA</option> 
                    <option <?php if($proveedor['estado']=='SONORA')echo 'Selected';?> value="SONORA">SONORA</option> 
                    <option <?php if($proveedor['estado']=='TABASCO')echo 'Selected';?> value="TABASCO">TABASCO</option> 
                    <option <?php if($proveedor['estado']=='TAMAULIPAS')echo 'Selected';?> value="TAMAULIPAS">TAMAULIPAS</option> 
                    <option <?php if($proveedor['estado']=='TLAXCALA')echo 'Selected';?> value="TLAXCALA">TLAXCALA</option> 
                    <option <?php if($proveedor['estado']=='VERACRUZ')echo 'Selected';?> value="VERACRUZ">VERACRUZ</option> 
                    <option <?php if($proveedor['estado']=='YUCATÁN')echo 'Selected';?> value="YUCATÁN">YUCATÁN</option> 
                    <option <?php if($proveedor['estado']=='ZACATECAS')echo 'Selected';?> value="ZACATECAS">ZACATECAS</option>
                    <option <?php if($proveedor['estado']=='OTRO')echo 'Selected';?> value="OTRO">OTRO</option>     
                </select>
                
            </div>
            
            <div class="span3">
                <label>País</label>
                <input type="text" name="proveedor[pais]" id="txtPais" class="form-control"  value="<? echo $proveedor['pais'];?>">
            </div>
            
            </div>
                <div class="span8" align="left">                  
               <h4>Contacto</h4>
             </div>
            
        <div class="span8">
            
            
            <div class="span3">
                <label>Teléfono</label>
                <input type="text" name="proveedor[telefono]" id="txtTelefonocontacto" class="form-control" value="<? echo $proveedor['telefono'];?>">
            </div>
            
            <div class="spanf" align="right">
                <a href="<? echo base_url();?>proveedor" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
      </div>
            
</form></div>
</div>