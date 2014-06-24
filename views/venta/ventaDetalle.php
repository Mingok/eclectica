
<input type="hidden" id="precio1" name="precio1"  />
<input type="hidden" id="precio2" name="precio2"  />
<input type="hidden" id="precio3" name="precio3"  />
<input type="hidden" id="precio4" name="precio4"  />
<input type="hidden" id="precio5" name="precio5"  />
<input type="hidden" id="precio6" name="precio6"  />

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="JavaScript:agregarCampo();" method="post" id="formItemVenta">
                    <table  style="width: 100%">
                        <tr>
                            <td style="text-align: left">
                                <h3 class="panel-title">
                                    Detalle
                                </h3>
                            </td>
                            <td style="text-align: right">
                                &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="Agregar Item" id="agregarItem" style="width: 150px;" class="btn btn-sm btn-success" />
                                &nbsp;&nbsp;&nbsp;&nbsp;<a id="fancyboxPrenda" class="fancyboxPrenda" href="#informacion">
                                    <input type="button"
                                           value="Buscar" style="width: 100px;"
                                           class="btn btn-sm btn-primary" /></a>&nbsp;&nbsp;&nbsp;&nbsp;  
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" id="idItemVenta" name="idItemVenta" />
                    <input type="hidden" id="condItemVenta" name="condItemVenta" />
                    <input type="hidden" id="ItemVenta" name="ItemVenta" />
                    <input type="hidden" id="detalleItemVenta" name="detalleItemVenta" />
                    <input type="hidden" id="precioItemVenta" name="precioItemVenta"  />

                </form> 
            </div>
            <div class="panel-body"  id="areaItemAVender">
                <div class="row">
                    <div class="col-md-12">
                        &nbsp;&nbsp;&nbsp;&nbsp;<label for="codItemVenta">
                            Codigo:
                        </label>
                        <input type="text" id="codItemVenta" class="codItemVenta form-control" placeholder="Ingresar" style="width: 140px" maxlength="12" autofocus disabled="disabled">
                        &nbsp;&nbsp;&nbsp;&nbsp;<label for="cantidadPrenda">
                            Cantidad :
                        </label>
                        <input type="number" title="Indresar Cantidad" name="cantidadItemVenta" id="cantidadItemVenta" style="width: 60px;" class="form-control" min="1" max="20" value="1" />


                        <label for="selecCondicionItem">
                            Condicion :
                        </label>
                        <select id="selecCondicionItem" name="selecCondicionItem" style="width: 270px" required >
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                        <img id="imgCondicionItem" style="display: none;" src="./imagenes/iconos/loading.gif" alt="Cargando" />
                        <div style="height: 10px"></div>
                    </div>
                </div>
            </div>


<form id="formdinamico" name="formdinamico" action="actions/venta/efectuarVenta.php">
            <div class="panel-body">
                
                    <input type="hidden" id="idClienteVenta" name="idClienteVenta" />
                    <input type="hidden" id="clienteVenta" name="clienteVenta" />
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



<script type="text/javascript">
    $('#selecCondicionItem').on("change", function(e) {

        $("#condItemVenta").val(this.options[this.value].text);
        switch (this.value) {
            case '1':
                $('input[name=precioItemVenta]').val($('#precio1').val());
                break;
            case '2':
                $('input[name=precioItemVenta]').val($('#precio2').val());
                break;
            case '3':
                $('input[name=precioItemVenta]').val($('#precio3').val());
                break;
            case '4':
                $('input[name=precioItemVenta]').val($('#precio4').val());
                break;
            case '5':
                $('input[name=precioItemVenta]').val($('#precio5').val());
                break;
            case '6':
                $('input[name=precioItemVenta]').val($('#precio6').val());
                break;
        }
    });
    
    
</script>