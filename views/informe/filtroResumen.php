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
    Resumen: Ventas - Costos - Gastos
</h1>
<form id="frm_filtro_resumen" method="post" action="">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <table style="width: 98%;">
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 25%">
                                <label>Desde:</label>
                                <input type="text" name="fecDesde" id="fecDesde" class="datepicker form-control" style="width: 120px" /> 
                            </td>
                            <td style="text-align: right;width: 25%">
                                <label>Hasta:</label>
                                <input type="text" name="fecHasta" id="fecHasta" class="datepicker form-control" style="width: 120px" /> 
                            </td>
                            <td style="text-align: center;width: 25%" >
                                <button type="button" id="btnFiltrar" style="width: 110px;" class="btn btn-sm btn-success" />Filtrar</button>
                                <button type="button" id="btnCancel" style="width: 110px;" class="btn btn-sm btn-danger"/> Todos</button>
                                <br />
                                <br />
                                <button type="button" id="btnPdfResumen" style="width: 110px;" class="btn btn-sm btn-warning" />Exportar Pdf</button>
                                <button type="button" id="btnXlsResumen" style="width: 110px;" class="btn btn-sm btn-warning" />Exportar Excel</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</form>