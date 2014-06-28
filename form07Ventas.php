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
                <?php include_once './views/venta/ventaItemVenta.php' ?>
            </div>
            <div class="col-md-12" id="ventaDetalle">
                <?php include_once './views/venta/ventaDetalle.php' ?>
            </div>
        </div>
    </div> 
</div>


<script type="text/javascript">
     $("#selecEmpleado").on("change", function(e) {
        $('#idVendedorVentaCod').val($($(this).select2('data').element).data('codigovendedor'));
        $('#idVendedorVenta').val(this.value);
       
        $("#selecEmpleado").empty().attr("disabled", "disabled");
        
    });
    
    $(document).ready(function() {
        var estado = 1; /*selecCliente*/
        $('#selecCliente').on("change", function(e) {
            $('#clienteVenta').val(this.options[this.value].text);
            $('#idClienteVenta').val(this.value);
            $("#cliente1").html(this.options[this.value].text);
            $("#cliente1").show('Slow');
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
                    equalTo:'#idVendedorVentaCod'
                }
            },
            messages: {
                entrega: {
                    required: "Ingrese Importe",
                    number: "Tiene que ser un numero"
                },
                vendedor: {
                    required: "Ingrese vendedor",
                    equalTo:"Codigo Erroneo"
                }
            },
            submitHandler: function(form) {
                // do other things for a valid form
                myFunction();
            }
        });
    });
    function myFunction() {
        switch (true) {
            case (importeTotal > $('#entrega').val()):
                var r = confirm("Confirma Venta \n Entrega: " + $('#entrega').val() + "\n Vende: " + importeTotal
                        + "\n Ahumentar CC: " + (importeTotal - $('#entrega').val()));
                if (r == true) {
                    form.submit();
                } else {

                    return false;
                }
                alert('Compra MAS de lo que paga');
                break;
            case (importeTotal == $('#entrega').val()):
                var r = confirm("Confirma Venta \n Entrega: " + $('#entrega').val() + "\n Vende: " + importeTotal);
                if (r == true) {
                    form.submit();
                } else {

                    return false;
                }
                alert('Compra Lo que paga');
                break;
            case (importeTotal < $('#entrega').val()):
                var r = confirm("Confirma Venta \n Entrega: " + $('#entrega').val() + "\n Vende: " + importeTotal
                        + "\n Dispinuir CC: " + (importeTotal - $('#entrega').val()));
                if (r == true) {
                    form.submit();
                } else {

                    return false;
                }alert('Compra MENOS de lo que paga');
                break;
        }
        /*           var r = confirm("Seguro?");
         if (r == true) {
         form.submit();
         } else {
         return false;
         }*/

    }
</script>