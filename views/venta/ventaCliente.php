<?php 
    require_once 'classes/persona/persona.php'; 
    $personaList=new persona(); 
    $personas=$personaList->personasDisponibles(); 
    require_once 'classes/tipoVenta/tipoVenta.php'; 
    $tipoVentaList = new tipoVenta (); 
    $tipoVentas = $tipoVentaList->tipoVentasDisponibles ();
?>
<h1>
	Clinete
</h1>
<div class="row">

			<div class="col-md-12">
            	<div class="panel panel-success">
		<div class="panel-body">
				<table style="width: 100%;">
					<tr>
						<td >
							<label style="text-align:left">
								Cliente:
							</label>
							<select id="selecCliente" style="width:170px" class="populate placeholder" autofocus="true" required>
								<option>
								</option>
								<optgroup label="Elija Uno">
									<?php foreach ($personas as $persona) { if (isset($persona)) { echo "<option value=" . $persona[ "idPersona"] . ">" . $persona[ "apellidoPersona"] . " " . $persona[ "nombrePersona"] . "</option>"; } }
									?>
								</optgroup>
							</select>
						</td>
						<td rowspan="2">
							<input style="text-align:right" type="button" value="Ver Historial" id="historial"  class="btn btn-sm btn-success"/>
						</td>
					</tr>
					<tr>
						<td>
							<label style="text-align:left">Condicion : </label>
							<select id="selecCondicionGral" name="selecCondicionGral" style="width: 170px" required>
								<option>
								</option>
								<optgroup label="Elija Uno">
									<option value="1">
										Grupo 1
									</option>
									<option value="2">
										Grupo 2
									</option>
									<option value="3">
										Grupo 3
									</option>
								</optgroup>
							</select>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>