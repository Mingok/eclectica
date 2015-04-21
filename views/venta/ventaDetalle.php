
<input type="hidden" id="precio1" name="precio1"  />
<input type="hidden" id="precio2" name="precio2"  />
<input type="hidden" id="precio3" name="precio3"  />
<input type="hidden" id="precio4" name="precio4"  />
<input type="hidden" id="precio5" name="precio5"  />
<input type="hidden" id="precio6" name="precio6"  />
<input type="hidden" id="precio7" name="precio7"  />
<input type="hidden" id="precio8" name="precio8"  />
<input type="hidden" id="precio9" name="precio9"  />
<input type="hidden" id="precio10" name="precio10"  />
<input type="hidden" id="precio11" name="precio11"  />

<input type="hidden" id="cuentaCorrienteCLiente" name="cuentaCorrienteCLiente" />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="JavaScript:agregarCampo();" method="post" id="formItemVenta`">
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
                    <input type="hidden" id="idCondItemVenta" name="idCondItemVenta" />
                    <input type="hidden" id="ItemVenta" name="ItemVenta" />
                    <input type="hidden" id="detalleItemVenta" name="detalleItemVenta" />
                    <input type="hidden" id="precioItemVenta" name="precioItemVenta"  />
                    <input type="hidden" id="costoItemVenta" name="costoItemVenta"  />

                </form>
            </div>
            <div class="panel-body"  id="areaItemAVender">
                <div class="row">
                    <div class="col-md-12">
                        &nbsp;&nbsp;&nbsp;&nbsp;<label for="codItemVenta">
                            Codigo:
                        </label>
                        <input type="text" id="codItemVenta" class="codItemVenta form-control" placeholder="Ingresar" style="width: 140px" maxlength="12" autofocus disabled="disabled">
                        &nbsp;&nbsp;&nbsp;&nbsp;<label for="cantidadItemVenta">
                            Cantidad :
                        </label>
                        <input type="number" title="Ingresar Cantidad" name="cantidadItemVenta" id="cantidadItemVenta" style="width: 60px;" class="form-control" min="1" value="1"/>


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

            <form id="formDinamico" name="formDinamico" action="actions/venta/efectuarVenta.php">
                <div class="panel-body">
                    <table id="contenedorcampos" class="table table-condensed">
                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                            <tr>
                                <td style="text-align: center; width: 15%;">
                                    Cod
                                </td>
                                <td style="text-align:left; width: 37%;">
                                    Nombre
                                </td>
                                <td style="text-align: center; width: 20%;">
                                    Condicion
                                </td>
                                <td style="text-align: center; width: 7%;">
                                    Precio
                                </td>
                                <td style="text-align: center; width: 7%;">
                                    Cant.
                                </td>
                                <td style="text-align: center; width: 10%;">
                                    P. Total
                                </td>
                                <td style="text-align: center; width: 4%;">
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
                                        Renglones:
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
<div class="col-md-12 no" id="saldoPisitivo" >
   Atencion Debe Cobrar: <span id="MuestraCCC"></span>
                                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" >
                                    Resumen
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" id="idVendedorVenta" name="idVendedorVenta" />
                                        <input type="hidden" id="idVendedorVentaCod" name="idVendedorVentaCod" />
                                        <input type="hidden" id="fecVenta" name="fecVenta"/>


                                        <input type="hidden" id="idClienteVenta" name="idClienteVenta" />
                                        <input type="hidden" id="clienteVenta" name="clienteVenta" />
                                        <input type="hidden" id="clienteCC" name="clienteCC" />
                                        <input type="hidden" id="condVenta" name="condVenta" />
                                        Ciente: <span id="cliente1" class="form-control" ></span>&nbsp;&nbsp;&nbsp;
                                        Entrega: <input type="text" placeholder="Ingrese" name="entrega" class="form-control" id="entrega" style="width: 100px">&nbsp;&nbsp;&nbsp;
                                        <input type="hidden" id="totalCompra" name="totalCompra" />
                                        <input type="hidden" id="totalCosto" name="totalCosto" />
                                        Vendedor: <input type="password"  placeholder="Ingrese" name="vendedor" class="form-control" id="vendedor" style="width: 100px" >&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-12" >
                                        Observacion: <textarea class="form-control" rows="3" placeholder="Ingrese un comentario" name="observacionVenta" id="observacion" maxlength="140"></textarea>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: right">

                                        <input type="submit" value="Confirmar"  name="Guardar" class="btn btn-sm btn-success">
                                        <input type="button" value="Limpiar" style="width: 100px;" class="btn btn-sm btn-danger" onClick="history.go(0)">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

    $('#selecCondicionItem').on("change", function(e) {

        $("#condItemVenta").val(this.options[this.selectedIndex].text);
        $("#idCondItemVenta").val(this.value);
        $('input[name=costoItemVenta]').val($('#precio1').val());
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
            case '7':
                $('input[name=precioItemVenta]').val($('#precio7').val());
                break;
            case '8':
                $('input[name=precioItemVenta]').val($('#precio8').val());
                break;
            case '9':
                $('input[name=precioItemVenta]').val($('#precio9').val());
                break;
            case '10':
                $('input[name=precioItemVenta]').val($('#precio10').val());
                break;
            case '11':
                $('input[name=precioItemVenta]').val($('#precio11').val());
                break;
        }
    });

    $("#fancyboxRenglon").fancybox({
        maxWidth: 700,
        maxHeight: 400,
        closeEffect: 'elastic'
    });


    $("#fancyboxPrenda").fancybox({
        minWidth: 300,
        minHeight: 400,
        closeEffect: 'elastic'
    });
    $("#cantidadItemVenta").keypress(function(e) {e.preventDefault(); } );// alert (e.keyCode); if (e.keyCode == 32) {  } })
    


</script>