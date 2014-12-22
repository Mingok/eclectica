<?php
require_once 'classes/persona/persona.php';
$personaList = new persona();
$vendedores = $personaList->vendedoresDisponibles();
$personas = $personaList->personasDisponibles();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<h1>
    Ventas realizadas
</h1>
<form id="frm_filtro_ventas" method="post" action="">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <table style="width: 98%;">
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                <label>Empleado:</label>
                                <select id="selecEmpleado" name="selecEmpleado" style="width:240px;" required>
                                    <option value="">Seleccione un Empleado</option>
                                    <?php
                                    foreach ($vendedores as $vendedor) {

                                        if (isset($vendedor)) {
                                            echo "<option value=" . $vendedor["idPersona"] . " data-codigoVendedor='" . $vendedor["codigoVendedor"] . "' >" . $vendedor["apellidoPersona"] . " " . $vendedor["nombrePersona"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Cliente:</label>
                                <select id="selecCliente" name="selecCliente" style="width:240px;" required>
                                    <option value="">Seleccione un Cliente</option>
                                    <?php
                                    foreach ($personas as $persona) {

                                        if (isset($persona)) {
                                            echo "<option value=" . $persona["idPersona"] . " data-codigoVendedor='" . $persona["codigoVendedor"] . "' >" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align: center;width: 25%" rowspan="3">
                                <button type="button" id="btnFiltrar" style="width: 110px;" class="btn btn-sm btn-success" />Filtrar</button>
                                <button type="button" id="btnCancel" style="width: 110px;" class="btn btn-sm btn-danger"/> Todos</button>
                                <br />
                                <br />
                                <button type="button" id="btnPdfVentas" style="width: 110px;" class="btn btn-sm btn-warning" />Exportar Pdf</button>
                                <button type="button" id="btnXlsVentas" style="width: 110px;" class="btn btn-sm btn-warning" />Exportar Excel</button>

                            </td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                <label>Desde:</label>
                                <input type="text" name="fecDesde" id="fecDesde" class="datepicker form-control" style="width: 120px" /> 
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Hasta:</label>
                                <input type="text" name="fecHasta" id="fecHasta" class="datepicker form-control" style="width: 120px" /> 
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