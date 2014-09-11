<?php
require_once 'classes/persona/persona.php';
$personaList = new persona();
$personas = $personaList->vendedoresDisponibles();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<h1>
    Existencias
</h1>
<form id="frm_filtro_ventas" method="post" action="">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <table style="width: 98%;">
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%" colspan="2">
                                <label>Empleado:</label>
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
                            </td>
                            <td style="text-align: center;width: 25%" rowspan="3">
                                <button type="button" id="btnfiltrar" style="width: 190px;" class="btn btn-sm btn-success" />Filtrar</button>

                                <br />
                                <br />
                                <button id="btncancel" style="width: 190px;" class="btn btn-sm btn-danger"/> Todos</button>

                            </td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                <label>Desde</label>
                                <input type="text" name="fecDesde" id="fecDesde" size="15" class="datepicker" /> 
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Hasta:</label>
                                <input type="text" name="fecHasta" id="fecHasta" size="15" class="datepicker" /> 
                            </td>
                        </tr>
<!--                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%" colspan="2">
                                <label>Tipo Venta:</label>
                                <select id="selecTipoVenta" name="selecTipoVenta" style="width:240px;" required>
                                    <option value="">Seleccione un Tipo de Venta</option>
                                    <?php
                                    foreach ($tipoVentas as $tipoVenta) {

                                        if (isset($tipoVenta)) {
                                            if (!($tipoVenta["idTipoVenta"] == null)) {
                                                echo "<option value=" . $tipoVenta["idTipoVenta"] . " data-codigoVendedor='" . $tipoVenta["idTipoVenta"] . "' >" . $tipoVenta["detalleTipoVenta"] . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>-->
                    </table>

                </div>
            </div>
        </div>
    </div>  
</form>