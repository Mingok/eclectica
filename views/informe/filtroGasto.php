<?php
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor ();
$proveedores = $proveedorList->proveedoresDisponibles();
require_once 'classes/formaPago/formaPago.php';
$formaPagoList = new formaPago ();
$formasPago = $formaPagoList->formaPagoDisponibles();
?>
<h1>
    Informe Costos y Gastos
</h1>
<form id="frm_filtro_gastos" method="post" action="">
    <input type="hidden" name="idEmpresaPrenda" value="1" />
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <table  style="width: 98%;">
                        <tr style="height: 40px;">
                            <td style="text-align: right;width: 17%">
                                <label>Desde:</label>
                                <input type="text" name="fecDesde" id="fecDesde" class="datepicker form-control" style="width: 120px" /> 
                            </td>
                            <td style="text-align: right;width: 35%">
                                <b>Proveedor:&nbsp;</b>
                                <select size="1" title="Ingrese Proveedor" name="idProveedorGasto" id="idProveedorGasto" style="width: 280px">
                                    <option value="">
                                    Seleccione un Proveedor</option>
                                    <?php
                                    foreach ($proveedores as $proveedor) {
                                        if (isset($proveedor)) {
                                            echo "<option value=" . $proveedor ["idProveedor"] . ">" . $proveedor ["nombreProveedor"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align: right;width: 25%">
                                <b>Importe:&nbsp;</b>
                                <input type="text" name="importeGasto" id="importeGasto" class="form-control" title="Ingresar Cantidad" style="width: 100px;"/>
                                &nbsp;
                            </td>
                            <td style="text-align: center; width: 23%;" >
                                <button type="button" id="btnFiltrar" style="width: 110px;" class="btn btn-sm btn-success" />Filtrar</button>
                                <button type="button" id="btnCancel" style="width: 110px;" class="btn btn-sm btn-danger"/> Todos</button>
                            </td>
                        </tr>
                        <tr style="height: 40px;">
                            <td style="text-align: right;">
                                <label>Hasta:</label>
                                <input type="text" name="fecHasta" id="fecHasta" class="datepicker form-control" style="width: 120px"  /> 
                            </td>
                            <td style="text-align: right;width: 25%">
                                <b>Forma de Pago:&nbsp;</b>
                                <select size="1" name="idFormaPagoGasto" id="idFormaPagoGasto" style="width: 250px" >
                                    <option value="">
                                    Seleccione Forma de pago</option>
                                    <?php
                                    foreach ($formasPago as $formaPago) {
                                        if (isset($formaPago)) {
                                            echo "<option value=" . $formaPago ["idFormaPago"] . ">" . $formaPago ["detalleFormaPago"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align:right">
                                <b>Detalle:&nbsp;</b>
                                <input type="text" name="detalleGasto" id="detalleGasto" class="form-control" placeholder="Ingrese Detalle" style="width: 200px;" />
                            </td>
                            <td style="text-align: center;">
                                <button type="button" id="btnPdfGastos" style="width:110px;" class="btn btn-sm btn-warning" />Exportar Pdf</button>
                                <button type="button" id="btnXlsGastos" style="width:110px;" class="btn btn-sm btn-warning" />Exportar Excel</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</form>