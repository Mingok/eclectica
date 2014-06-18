<form id="formdinamico" name="formdinamico" action="actions/venta/efectuarVenta.php">
    <input type="hidden" id="idClienteVenta" name="idClienteVenta" />
    <input type="hidden" id="clienteVenta" name="clienteVenta" />
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">
                    Detalle
                </h3>
            </div>
                <div class="panel-body">
                    <table id="contenedorcampos" class="table table-striped">
                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                            <tr>
                                <td>
                                    Cod
                                </td>
                                <td>
                                    Nombre
                                </td>
                                <td>
                                    Condicion
                                </td>
                                <td>
                                    Precio
                                </td>
                                <td>
                                    Cantidad
                                </td>
                                <td>
                                    P. Total
                                </td>
                                <td>
                                    X
                                </td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <strong>
                                        Prendas:
                                    </strong>
                                    <span id="span_cantidad">
                                    </span>
                                </td>
                                <td colspan="3">
                                    <strong>
                                        Total:
                                    </strong>
                                    <span id="span_Total">
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
