<?php
require_once 'classes/persona/persona.php';
$personaList = new persona();
$personas = $personaList->personasDisponibles();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles ();
$condFiltrada = new tipoVenta ();
?>
<h1>
	Clinete
</h1>
<div class="row">
	<div class="col-md-12">
		Cliente:
		<select id="selecCliente" style="width: 250px" class="form-control" autofocus="true" required>
			<optgroup label="Elija Uno">
				<?php foreach ($personas as $persona) { if (isset($persona)) { echo "<option value=" . $persona[ "idPersona"] . ">" . $persona[ "apellidoPersona"] . " " . $persona[ "nombrePersona"] . "</option>"; } }
				?>
			</optgroup>
		</select>
		<br />
		<br />
		Condicion :
		<select id="selecCondicion" name="selecCondicion" style="width: 250px" class="form-control" required>
			<optgroup label="Elija Uno">
				<?php foreach ($tipoVentas as $tipoVenta) { if (isset($tipoVenta)) { echo "<option value=" . $tipoVenta[ "idTipoVenta"] . ">" . $tipoVenta[ "detalleTipoVenta"]. "</option>"; } } ?>
			</optgroup>
		</select>
	</div>
</div>