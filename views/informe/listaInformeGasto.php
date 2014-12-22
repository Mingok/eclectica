<?php ?>
<div id="content">
    <div class="filtro">
        <?php include_once 'views/informe/filtroGasto.php'; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body  ">
                    <div class="scrolPrenda">
                        <table class="table table-condensed" id="data">
                            <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                <tr>
                                    <th width="9%" style="text-align: center"><span title="fechaGasto">Fecha</span></th>
                                    <th width="22%" style="text-align: center;"><span title="idProveedorGasto">Proveedor</span></th>
                                    <th width="20%" style="text-align: center;"><span title="idFormaPagoGasto">F.Pago</span></th>
                                    <th width="40%" style="text-align: center"><span title="detalleGasto">Concepto</span></th>
                                    <th width="9%" style="text-align: center"><span title="importeGasto">Importe</span></th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>