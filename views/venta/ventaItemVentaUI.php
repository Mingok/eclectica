<div id="informacion" style="display:none; ">
    <div class="panel panel-default">
        <div class="panel-heading">  
            <div class="row" style="text-align: right; padding-right: 20px;">

                <h3 class="panel-title" style="font-weight: bold;text-align: left; padding-left: 20px;">
                    <b> Prendas </b>
                </h3>

            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12" >
                    <table class="tabla">
                        <tr>
                            <td style="text-align: right;">
                                <div class="scrol1">
                                    <table class="table table-condensed" id="tblEligePrenda">
                                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                            <tr>
                                                <td style="width: 5%; text-align: center">
                                                    Selec
                                                </td>
                                                <td style="width: 8%; text-align: center;">
                                                    Cod
                                                </td>
                                                <td style="width: 30%">
                                                    Nombre
                                                </td>
                                                <td style="width: 5%">
                                                    T.
                                                </td>
                                                <td style="width: 12%">
                                                    Color
                                                </td>
                                                <td style="width: 10%">
                                                    Estampado
                                                </td>
                                                <td style="width: 13%">
                                                    Tela
                                                </td>
                                                <td style="width: 12%">
                                                    Temporada
                                                </td>
                                                <td style="width: 5%">
                                                    C.
                                                </td>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tblEligePrenda').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "views/venta/ajax_venta.php",
            "language": {
                "url": "js/datatableUI/spanish_ventas.json"

            },
            //Esto deshabilita el ordenamiento por columnas
            // hay que poner un {"bSortable": false},
            // por cada columna que tenga la tabla
            "aoColumns": [
                {"bSortable": false},
                {"bSortable": false},
                {"bSortable": false},
                {"bSortable": false},
                {"bSortable": false},
                {"bSortable": false},
                {"bSortable": false},
                {"bSortable": false},
                {"bSortable": false}

            ]
        });
        $('#tblEligePrenda').on('draw.dt', function () {
            $('.itemAVender').click(function () {
                $("#cantidadItemVenta").attr('max', $(this).data('cantidadprenda'));
                $('#codItemVenta').val('0');
                $('#cantidadItemVenta').val('1');
                $('#selecCondicionItem').val(["0"]).select2();
                $('#idItemVenta').val($(this).data('idprenda'));
                $('#codItemVenta').val($(this).data('codigoprenda'));
                $('#detalleItemVenta').val($(this).data('detalleprenda'));
                $('#precio1').val($(this).data('valor1'));
                $('#precio2').val($(this).data('valor2'));
                $('#precio3').val($(this).data('valor3'));
                $('#precio4').val($(this).data('valor4'));
                $('#precio5').val($(this).data('valor5'));
                $('#precio6').val($(this).data('valor6'));
                $('#precio7').val($(this).data('valor7'));
                $('#precio8').val($(this).data('valor8'));
                $('#precio9').val($(this).data('valor9'));
                $('#precio10').val($(this).data('valor10'));
                $('#precio11').val($(this).data('valor11'));
                $('#cuentaCorriente').val($(this).data('cuentaCorrientePersona'));
                $('#agregarItem').show();
                $('#areaItemAVender').show();
                $.fancybox.close();
            });
        });


    });

</script>