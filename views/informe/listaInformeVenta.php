<?php ?>
<div id="content">
    <div class="filtro">
        <?php include_once 'views/informe/filtroVenta.php'; ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body  ">
                    <div class="scrolPrenda">
                        <table class="table table-striped" id="data">
                            <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                <tr>
                                    <th width="20%"><span title="venta.fechaVenta">Fecha</span></th>
                                    <th width="30%"><span title="persona.detallePersona">Cliente</span></th>
                                    <th width="10%"><span title="venta.precioVenta">Vendido</span></th>
                                    <th width="10%"><span title="venta.entregaCliente">Entregado</span></th>
                                    <th width="30%"><span title="persona1.detallePersona">Vendedor</span></th>
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