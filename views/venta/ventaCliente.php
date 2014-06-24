<?php
require_once 'classes/persona/persona.php';
$personaList = new persona();
$personas = $personaList->personasDisponibles();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$prendas = $prendaList->prendasDisponibles();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Clinete
                </h3>
            </div>
            <div class="panel-body" style="text-align: right">
                <label style="text-align:left">
                    Cliente:
                </label>
                <select id="selecCliente" name="selecCliente" style="width:240px;" required>
                    <option></option>
                    <?php
                    foreach ($personas as $persona) {
                        if (isset($persona)) {
                            echo "<option value=" . $persona["idPersona"] . ">" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div style="height: 10px"></div>
                <label style="text-align:left">Condicion : </label>
                <select id="selecCondicionGral" name="selecCondicionGral" style="width: 240px" required>
                    <option></option>
                    <option value="1">
                        Grupo 1
                    </option>
                    <option value="2">
                        Grupo 2
                    </option>
                    <option value="3">
                        Grupo 3
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>
