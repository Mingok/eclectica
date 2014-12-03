<?php
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor ();
$proveedores = $proveedorList->proveedoresDisponibles();
require_once 'classes/formaPago/formaPago.php';
$formaPagoList = new formaPago ();
$formasPago = $formaPagoList->formaPagoDisponibles();
?>
<h1>
    Gastos
</h1>
<div id="ver" style="display: block/*none*/ ; padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Agregar
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="actions/gasto/guardarGasto.php" class="formGastos" id="formGastos">
                        <div class="row">
                            <div class="col-md-3">    
                                <b>Fecha:&nbsp;</b>
                                <input type="hidden" value="" name="idGasto" />
                                <input type="hidden" name="idEmpresaGasto" value="1" />
                                <input type="date" name="fechaGasto" id="fechaGasto" style="width: 180px;" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <b>Detalle:&nbsp;</b>
                                <input type="text" name="detalleGasto" id="detalleGasto" class="form-control" placeholder="Ingrese Detalle" style="width: 500px;" />
                            </div>  
                            <div class="col-md-3">
                                <b>Importe:&nbsp;</b>
                                <input type="text" name="importeGasto" id="importeGasto" class="form-control" title="Ingresar Cantidad" style="width: 100px;"/>
                            </div>
                        </div>
                        <div style="height: 10px"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <b>Proveedor:&nbsp;</b>
                                <select size="1" title="Ingrese Proveedor" name="idProveedorGasto" id="idProveedorGasto" style="width: 280px" class="form-control">
                                    <option>
                                    </option>
                                    <?php
                                    foreach ($proveedores as $proveedor) {
                                        if (isset($proveedor)) {
                                            echo "<option value=" . $proveedor ["idProveedor"] . ">" . $proveedor ["nombreProveedor"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <b>Forma de Pago:&nbsp;</b>
                                <select size="1" name="idFormaPagoGasto" id="idFormaPagoGasto" style="width: 250px" class="form-control">
                                    <option>
                                    </option>
                                    <?php
                                    foreach ($formasPago as $formaPago) {
                                        if (isset($formaPago)) {
                                            echo "<option value=" . $formaPago ["idFormaPago"] . ">" . $formaPago ["detalleFormaPago"] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" value="Agregar" style="width: 100px;" class="btn btn-sm btn-success" />
                            </div>
                            <div class="col-md-2">
                                <input type="button" value="Limpiar" style="width: 100px;" class="btn btn-sm btn-danger"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>