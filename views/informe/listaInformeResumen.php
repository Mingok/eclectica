<?php ?>
<div id="content">
    <div class="filtro">
        <?php include_once 'views/informe/filtroResumen.php'; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body  ">
                    <div class="scrolPrenda">
                        <div class="row">
                            <div class="col-md-6">

                                <table class="table table-condensed" id="dataTipoVenta">
                                    <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                        <tr>
                                            <th ><span title="idTipoVenta">Forma de pago</span></th>
                                            <th ><span title="precioVendido">total</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-condensed" id="dataCostos">
                                    <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                        <tr>
                                            <th ><span title="nombreProveedor">Proveedor</span></th>
                                            <th ><span title="detalleFormaPago">Forma De pago</span></th>
                                            <th ><span title="importeGasto">Total</span></th>
                                        </tr>
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
    </div>
