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
                <h3 class="panel-title" style="font-weight: bold;">
                    Clinete
                </h3>
            </div>
            <div class="panel-body" style="text-align: right">
                <label style="text-align:left">
                    Empleado:
                </label>
                <select id="selecEmpleado" name="selecEmpleado" style="width:240px;" required>
                    <option value="">Seleccione un Empleado</option>
                    <?php
                    foreach ($personas as $persona) {

                        if (isset($persona)) {
                            if (!($persona["codigoVendedor"] == null)) {
                                echo "<option value=" . $persona["idPersona"] . " data-codigoVendedor='" . $persona["codigoVendedor"] . "' >" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <div style="height: 10px"></div>
                <div id="divCliente">
                    <label for="selecCliente" style="text-align:left">
                        Cliente:
                    </label>
                    <select id="selecCliente" name="selecCliente" style="width:240px;" required>
                        <option value="">Seleccione un Cliente</option>
                        <?php
                        foreach ($personas as $persona) {
                            if (isset($persona)) {
                                echo "<option value=" . $persona["idPersona"] . " data-ccc='" . $persona["cuentaCorrientePersona"] . "' >" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div style="height: 10px"></div>
                <div id="divCondicion">
                    <label style="text-align:left">Condicion : </label>
                    <select id="selecCondicionGral" name="selecCondicionGral" style="width: 240px" required>
                        <option></option>
                        <option value="1">
                            Costo / Contado
                        </option>
                        <option value="2">
                            Descuento
                        </option>
                        <option value="3">
                            Recargo
                        </option>
                    </select>
                </div>
                <div id="divFechaVenta">
                    <label style="text-align:left">Fecha Venta : </label>
                    <input type="text" name="fechaVenta" id="fechaVenta" class="datepicker form-control" style="width: 120px; cursor: pointer" readonly="true" />
                </div>
            </div>
        </div>
    </div>
</div>
