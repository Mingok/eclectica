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
				<form action="actions/empresa/moificarEmpresa.php" class="formEmpresa" enctype="multipart/form-data" method="post">
					<?php foreach ($empresas as $empresa) { ?>
						<div class="row" style="height: 35px;">
							<div class="col-md-4" style="text-align: right;">
								<label for="nombreEmpresa">Raz�n Social:</label>
								<input type="text" style="width: 150px;" maxlength="50px" name="nombreEmpresa" value="<?php echo $empresa['nombreEmpresa'];?>"/>
							</div>
							<div class="col-md-4" style="text-align: right;">
								<label for="cuitEmpresa">CUIT:</label>
								<input type="text" style="width: 120px;" maxlength="50px" name="cuitEmpresa" value="<?php echo $empresa['cuitEmpresa'];?>"/>
							</div>
							<div class="col-md-4" style="text-align: right;">
								<label for="telEmpresa">Tel.:</label>
								<input type="text" style="width: 150px;" maxlength="50px" name="telEmpresa" value="<?php echo $empresa['telEmpresa'];?>"/>
							</div>
						</div>
						<div class="row" style="height: 35px;">
							<div class="col-md-4" style="text-align: right;">
							<label for="emailEmpresa">	E-mail:</label>
								<input type="text" style="width: 250px;" name="emailEmpresa" value="<?php echo $empresa['emailEmpresa'];?>"/>
							</div>
							<div class="col-md-4" style="text-align: right;">
								<label for="dirEmpresa">Domicilio:</label>
								<input type="text" style="width: 150px;" maxlength="50px" name="dirEmpresa" value="<?php echo $empresa['dirEmpresa'];?>"/>
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
								<input type="submit" name="pNuevo" value="Modificar" class="btn btn-success"/>
							</div>
						</div>
						<?php }?>
				</form>
			</div>
		</div>