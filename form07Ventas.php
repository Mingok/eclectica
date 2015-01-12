<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <?php include_once './views/venta/ventaCliente.php' ?>
            </div>
            <div class="col-md-12 " >
                <?php include_once './views/venta/ventaHistoricoCliente.php'; ?>
            </div >
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <?php include_once './views/venta/ventaItemVenta.php';
                ?>

            </div>
            <div class="col-md-12" id="ventaDetalle">
                <?php include_once './views/venta/ventaDetalle.php' ?>

            </div>
        </div>
    </div> 
</div>
<input type="hidden" id="estaVenta" name="estaVenta" >

<script type="text/javascript">
    var estado = 0; /*selecCliente*/
    var pasar = 0;
    var pasar1 = 0;
    var pasar2 = 0;

    $(document).ready(function() {
        $('#divCliente').hide();
        $('#divCondicion').hide();
        $("#selecEmpleado").on("change", function(e) {
            $('#idVendedorVentaCod').val($($(this).select2('data').element).data('codigovendedor'));
            $('#idVendedorVenta').val(this.value);
            auxiliar = this.value;
            $('#selecCliente option[value="' + auxiliar + '"]').addClass("hide_me");

            $('#divCliente').show();
            $("#selecEmpleado").empty().attr("disabled", "disabled");
        });
        var estado = 1; /*selecCliente*/
        $('#selecCliente').on("change", function(e) {
            $('#clienteVenta').val(this.options[this.selectedIndex].text);
            $('#idClienteVenta').val(this.value);
            $('#cuentaCorrienteCLiente').val($($(this).select2('data').element).data('ccc'));
            if ($('#cuentaCorrienteCLiente').val()<'0'){$('#saldoPisitivo').removeClass('no');}
            $("#cliente1").html(this.options[this.selectedIndex].text);
            $("#cliente1").show('Slow');
            $('#divCondicion').show();
            
            $('#selecCliente').empty().attr("disabled", "disabled");
            var url = 'indexComprasCliente.php';
            var idCliente = $('#idClienteVenta').val();
            $.ajax({
                type: "POST",
                url: url,
                data: {'idCliente': idCliente}, // serializes the form's elements.
                success: function(data) {
                    if (data) {
                        $('.movimientosClienteCont').html(data);
                    }
                }
            });
        });
        $("#selecCondicionGral").change(function() {
            $("#selecCondicionItem").empty().attr("disabled", "disabled");
            if ($(this).val() != "") {
                var dato = $(this).val();
                $('#condVenta').val(dato);
                $("#imgCondicionItem").show();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "./actions/venta/filtrarCondicion.php",
                    data: "grupoTipoVenta=" + dato + "&tarea=filtraCondicion",
                    success: function(msg) {
                        $("#selecCondicionItem").empty().removeAttr("disabled").append(msg);
                        $("#imgCondicionItem").hide();
                    }
                });
            } else {
                $("#selecCondicionGral").empty().attr("disabled", "disabled");
            }
            
            
            $("#MuestraCCC").html($('#cuentaCorrienteCLiente').val());
            $("#selecCondicionGral").empty().attr("disabled", "disabled");
            $('#ventaDetalle').show('fast');
        });


        $('#selecEmpleado').select2({
            placeholder: "Seleccionar",
            allowClear: true
        });
        $('#selecCliente').select2({
            placeholder: "Seleccionar",
            allowClear: true
        });
        $('#selecCondicionItem').select2({
            placeholder: "Seleccionar",
            allowClear: true
        });
        $('#selecCondicionGral').select2({
            placeholder: "Seleccionar",
            allowClear: true
        });
        $('#areaItemAVender').hide();
        $('#agregarItem').hide();
        $("#cliente1").hide();
        $("#selecCondicionItem").empty().attr("disabled", "disabled");
        $('#ventaDetalle').hide();
        $("#formDinamico").validate({
            rules: {
                entrega: {
                    required: true,
                    number: true
                },
                vendedor: {
                    required: true,
                    equalTo: '#idVendedorVentaCod'
                }
            },
            messages: {
                entrega: {
                    required: "Ingrese Importe",
                    number: "Tiene que ser un numero"
                },
                vendedor: {
                    required: "Ingrese vendedor",
                    equalTo: "Codigo Erroneo"
                }
            },
            submitHandler: function(form) {
                // do other things for a valid form
                if (campos != 0) {
                    pasar = 1;
                } else {
                    alert("Agregue al menos 1 prenda");
                    pasar = 0;
                    return false;
                }
                if ($('#idClienteVenta').val() != '') {
                    pasar1 = 1;
                } else {
                    pasar1 = 0;
                    alert("Eliga Cliente");
                    return false;

                }
                if ($('#idVendedorVentaCod').val() != '') {
                    pasar2 = 1;
                } else {
                    alert("Eliga Empleado");
                    pasar2 = 0;

                }
                if ((pasar == 1) & (pasar1 == 1) & (pasar2 == 1)) {
                    myFunction();
                }
            }
        });

    });
    function myFunction() {
        switch (true) {
            case (importeTotal > $('#entrega').val()):
                var r = confirm("Confirma Venta \n\n Entrega: " + $('#entrega').val() + "\n Vende: " + importeTotal
                        + "\n Aumentar CC: " + (importeTotal - $('#entrega').val()));
                if (r == true) {
                    form.submit();
                } else {

                    return false;
                }

                break;
            case (importeTotal == $('#entrega').val()):
                var r = confirm("Confirma Venta \n\n Entrega: " + $('#entrega').val() + "\n Vende: " + importeTotal);
                if (r == true) {
                    form.submit();
                } else {

                    return false;
                }

                break;
            case (importeTotal < $('#entrega').val()):
                var r = confirm("Confirma Venta \n\n Entrega: " + $('#entrega').val() + "\n Vende: " + importeTotal
                        + "\n Dispinuir CC: " + (importeTotal - $('#entrega').val()));
                if (r == true) {
                    form.submit();
                } else {

                    return false;
                }

                break;
        }

    }
</script>