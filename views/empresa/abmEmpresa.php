
	<?php 
				require_once 'classes/empresa/empresa.php';
				$empresaList = new empresa();
				$empresas = $empresaList->datosEmpresa();
             
				?>
<h1 style="text-align: left;">
	&nbsp;Empresa &nbsp;
</h1>

<form action="actions/empresa/moificarEmpresa.php" >
<table class="tablaProv">
	 <?php 
					foreach ($empresas as $empresa) {
					?>	
    <tr>       
		<td style="height:30px; text-align: left; height: 40px;">
			<h2>
            
				Datos de la Empresa
			</h2>
		</td>
		<td colspan="2">
			Logo:&nbsp;
			<input type="file" id="logoEmpresa" name="logoEmpresa" title="Seleccionar archivo desde su PC" accept="image/x-png, image/gif, image/jpeg" />
		</td>
		</td>
	</tr>
   
	<tr>
    		
		<td style="height:30px;  text-align:Right; ">
			Razón Social:&nbsp;&nbsp;
			<input type="text" style="width: 150px;" maxlength="50px" name="nombreEmpresa" value="<?php echo $empresa['nombreEmpresa'];?>"/>
		</td>
		<td style="height:30px;  text-align:Right; ">
			CUIT:&nbsp;
			<input type="text" style="width: 120px;" maxlength="50px" name="cuitEmpresa" value="<?php echo $empresa['cuitEmpresa'];?>"/>
		</td>
		<td style="height:30px;  text-align:Right;">
			Tel.:
			<input type="text" style="width: 150px;" maxlength="50px" name="telEmpresa" value="<?php echo $empresa['telEmpresa'];?>"/>
		</td>
		<td style="height:30px; text-align: right;" rowspan="3">
			<input type="submit" name="pNuevo" value="Modificar" class="btn btn-success"/>
	</tr>
	<tr>
		<td style="height:30px;  text-align:Right;" colspan="2">
			E-mail:&nbsp;
			<input type="text" style="width: 250px;" name="emailEmpresa" value="<?php echo $empresa['emailEmpresa'];?>"/>
		</td>
		<td style="height:30px;  text-align:Right; ">
			Domicilio:&nbsp;&nbsp;
			<input type="text" style="width: 150px;" maxlength="50px" name="dirEmpresa" value="<?php echo $empresa['dirEmpresa'];?>"/>
		</td>
		
	</tr>
    	<?php }?>
</table>
</form>