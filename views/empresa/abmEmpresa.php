<?php 
	require_once 'classes/empresa/empresa.php'; 
	$empresaList = new empresa(); 
	$empresas = $empresaList->datosEmpresa(); 
?>
	<div id="Empresa">
		<h1>
			Empresa
		</h1>
		<div class="panel panel-success">
			<div class="panel-body">
				<form action="actions/empresa/moificarEmpresa.php" id="formEmpresa" class="formEmpresa" enctype="multipart/form-data" method="post">
					<?php foreach ($empresas as $empresa) { ?>
						<div class="row" style="height: 35px;">
							<div class="col-md-4" style="text-align: right;">
								<label for="nombreEmpresa">Raz&oacute;n Soc.: </label>
                                                                <input type="text" style="width: 150px;" maxlength="50px" name="nombreEmpresa" value="<?php echo $empresa['nombreEmpresa'];?>" title="Ingrese Razon Soc." required/>
							</div>
							<div class="col-md-4" style="text-align: right;">
								<label for="cuitEmpresa">CUIT:</label>
								<input type="text" style="width: 120px;" maxlength="50px" name="cuitEmpresa" value="<?php echo $empresa['cuitEmpresa'];?>" title="Ingrese CUIT" required/>
							</div>
							<div class="col-md-4" style="text-align: right;">
								<label for="telEmpresa">Tel.:</label>
								<input type="text" style="width: 150px;" maxlength="50px" name="telEmpresa" value="<?php echo $empresa['telEmpresa'];?>" title="Ingrese Telefono" required/>
							</div>
						</div>
						<div class="row" style="height: 35px;">
							<div class="col-md-4" style="text-align: right;">
							<label for="emailEmpresa">	E-mail:</label>
								<input type="email" style="width: 250px;" name="emailEmpresa" value="<?php echo $empresa['emailEmpresa'];?>" title="Ingrese Email"  required/>
							</div>
							<div class="col-md-4" style="text-align: right;">
								<label for="dirEmpresa">Domicilio:</label>
								<input type="text" style="width: 150px;" maxlength="50px" name="dirEmpresa" value="<?php echo $empresa['dirEmpresa'];?>" title="Ingrese Direccion" required/>
							</div>
							<div class="col-md-4" style="text-align: right;">
								<label for="logoEmpresa">
									Logo:
								</label>
								<input type="file" id="logoEmpresa" name="logoEmpresa" title="Seleccionar" accept="image/x-png, image/gif, image/jpeg" />
							</div>
						</div>
						<div class="row" style="height: 55px;">
							<div class="col-md-12" style="text-align: right; top:15px;">
								<input type="submit" name="pNuevo" value="Modificar" class="btn btn-sm btn-success"/>
							</div>
						</div>
						<?php }?>
				</form>
			</div>
		</div>
		
		<script type="text/javascript">
		$("#formEmpresa").validate();
		</script>