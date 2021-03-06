<script language="javascript" type="text/javascript">
    function pintafila(fila, color) {
        antes = document.getElementById('tblPrenda').rows[fila].style.backgroundColor;
        for (i = 1; i < document.getElementById('tblPrenda').rows.length; i++) {
            if (document.getElementById('tblPrenda').rows[i].id == fila) {
                document.getElementById('tblPrenda').rows[i].style.backgroundColor = color;
            } else {
                if (!(antes == fila)) {
                    document.getElementById('tblPrenda').rows[i].style.backgroundColor = "transparent";
                }
            }
        }
    }
</script>
<h1>
    Prendas
</h1>
<div  id="exitoPrenda" style="display: none; padding-top: 10px;">

    <div id="CPrenda" class="alert alert-success alert-success1" style=""></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body  ">
<!--                <div class="col-md-12" style="text-align: left; top:19px;">
                    <a href="#prenda">
                        
                    </a>
                </div>-->
                <div class="row">
                    <table class="table">
                        <tr>
                            <td colspan="3" style="text-align: right;">
                                <div class="scrolPrenda">
                                    <table class="table table-condensed" id="tblPrenda">
                                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                            <tr>
                                                <td style="width: 4%">
                                                    Mod
                                                </td>
                                                <td style="width: 4%">
                                                    Cop
                                                </td>
                                                <td style="width: 10%">
                                                    Cod
                                                </td>
                                                <td style="width: 30%">
                                                    Nombre
                                                </td>
                                                <td style="width: 4%">
                                                    Talle
                                                </td>
                                                <td style="width: 10%">
                                                    Color
                                                </td>
                                                <td style="width: 10%">
                                                    Estampado
                                                </td>
                                                <td style="width: 14%">
                                                    Tela
                                                </td>
                                                <td style="width: 10%">
                                                    Temporada
                                                </td>
                                                <td style="width: 4%">
                                                    Cantidad
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
        $('#tblPrenda').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "views/prenda/ajax_prenda.php",
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ prendas",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ prendas",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 prendas",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Ingrese codigo o detalle de la prenda:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

            },
            "dom": '<"toolbar" >frt<"bottom">ilp',
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
                {"bSortable": false},
                {"bSortable": false}

            ]
        });
         $("div.toolbar").html('<input type="button" value="Agregar" style="width: 100px;" class="buttonPrendasNueva btn btn-sm btn-success" />');
        $('#tblPrenda').on('draw.dt', function () {
            $('.buttonPrendasNueva').click(function () {
        $('#montoto').hide();
        $('#ver').show("slow");
        $('html,body').animate({scrollTop: $("#ver").offset().top}, 2000);
        $('.btn-success').val('Agregar');
        $('input[name=idPrenda]').val('');

        $('input[name=cantidadPrenda]').val('');
        $('input[name=codigoPrenda]').val('');
        $('input[name=detallePrenda]').val('');
        $('select[name=idMarcaPrenda]').val('0');
        $('select[name=idProveedorPrenda]').val('0');
        $('select[name=idEstacionPrenda]').val('');
        $('select[name=idColorPrenda]').val('0');
        $('select[name=idTelaPrenda]').val('0');
        $('select[name=idTallePrenda]').val('0');
        $('select[name=idEstampadoPrenda]').val('0');
        $('select[name=idEstacionPrenda]').val('0');
        //$('.btn-danger').addClass('no');
        $('input[name=idPrenda]').val(null);
        $('input[name=codigoPrenda]').hide();
        $('label[for=codigoPrenda').hide();
    });
            $('.buttonCopiar').on('click', function () {
                $('#ver').show("slow");
                $('html,body').animate({scrollTop: $("#ver").offset().top}, 2000);
                $('.buttonPrendas').val('Agregar');
                $('input[name=idPrenda]').val('');
                $('input[name=cantidadPrenda]').val($(this).data('cantidadprenda'));
                $('input[name=codigoPrenda]').val($(this).data('codigoprenda'));
                $('input[name=detallePrenda]').val($(this).data('detalleprenda') + "[2]");
                $('select[name=idMarcaPrenda]').val($(this).data('idmarcaprenda'));
                $('select[name=idProveedorPrenda]').val($(this).data('idproveedorprenda'));
                $('select[name=idEstacionPrenda]').val($(this).data('idestacionprenda'));
                $('select[name=idColorPrenda]').val($(this).data('idcolorprenda'));
                $('select[name=idTelaPrenda]').val($(this).data('idtelaprenda'));
                $('select[name=idTallePrenda]').val($(this).data('idtalleprenda'));
                $('select[name=idEstampadoPrenda]').val($(this).data('idestampadoprenda'));
                $('input[name=tipoVenta1]').val($(this).data('valor1'));
                $('input[name=tipoVenta2]').val($(this).data('valor2'));
                $('input[name=tipoVenta3]').val($(this).data('valor3'));
                $('input[name=tipoVenta4]').val($(this).data('valor4'));
                $('input[name=tipoVenta5]').val($(this).data('valor5'));
                $('input[name=tipoVenta6]').val($(this).data('valor6'));
                $('input[name=tipoVenta7]').val($(this).data('valor7'));
                $('input[name=tipoVenta8]').val($(this).data('valor8'));
                $('input[name=tipoVenta9]').val($(this).data('valor9'));
                $('input[name=tipoVenta10]').val($(this).data('valor10'));
                $('input[name=tipoVenta11]').val($(this).data('valor11'));
                $('input[name=codigoPrenda]').hide();
                $('label[for=codigoPrenda]').hide();
            });
            $('.editButtonPrenda').on('click', function () {
                $('#ver').show("slow");
                $('html,body').animate({scrollTop: $("#ver").offset().top}, 2000);
                $('input[name=idPrenda]').val($(this).data('idprenda'));
                $('input[name=cantidadPrenda]').val($(this).data('cantidadprenda'));
                $('input[name=codigoPrenda]').val($(this).data('codigoprenda'));
                $('input[name=detallePrenda]').val($(this).data('detalleprenda'));
                $('select[name=idMarcaPrenda]').val($(this).data('idmarcaprenda'));
                $('select[name=idProveedorPrenda]').val($(this).data('idproveedorprenda'));
                $('select[name=idEstacionPrenda]').val($(this).data('idestacionprenda'));
                $('select[name=idColorPrenda]').val($(this).data('idcolorprenda'));
                $('select[name=idTelaPrenda]').val($(this).data('idtelaprenda'));
                $('select[name=idTallePrenda]').val($(this).data('idtalleprenda'));
                $('select[name=idEstampadoPrenda]').val($(this).data('idestampadoprenda'));
                $('input[name=tipoVenta1]').val($(this).data('valor1'));
                $('input[name=tipoVenta2]').val($(this).data('valor2'));
                $('input[name=tipoVenta3]').val($(this).data('valor3'));
                $('input[name=tipoVenta4]').val($(this).data('valor4'));
                $('input[name=tipoVenta5]').val($(this).data('valor5'));
                $('input[name=tipoVenta6]').val($(this).data('valor6'));
                $('input[name=tipoVenta7]').val($(this).data('valor7'));
                $('input[name=tipoVenta8]').val($(this).data('valor8'));
                $('input[name=tipoVenta9]').val($(this).data('valor9'));
                $('input[name=tipoVenta10]').val($(this).data('valor10'));
                $('input[name=tipoVenta11]').val($(this).data('valor11'));
                $('input[name=codigoPrenda]').show("slow");
                $('label[for=codigoPrenda]').show("slow");
                $('.btn-success').val('Modificar');
                $('.btn-danger').removeClass('no');
            });
        });

    });

</script>