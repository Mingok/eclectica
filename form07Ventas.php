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
            <div class="col-md-12">
                <?php include_once './views/venta/ventaImprtes.php' ?>
            </div>
        </div>
    </div> 
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var estado = 1; /*selecCliente*/
        $('#selecCliente').on("change", function(e) {
            $('#clienteVenta').val(this.options[this.value].text);
            $('#idClienteVenta').val(this.value);
            $("#cliente1").html(this.options[this.value].text);
            $("#cliente1").show('Slow');
            $('#selecCliente').empty().attr("disabled", "disabled");
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



    });
  $("#formdinamico").validate({
        rules: {
            entrega: {
                required: true,
                number: true

            },
            vendedor: {
                required: true,
                equalTo: <?php echo "pass" ;?>

            }
        },
        messages: {
            entrega: {
                required: "Ingrese Importe",
                number: "Tiene que ser un numero"
            },
            vendedor: {
                required: "Ingrese vendedor",
                equalTo: "Tiene que ser Igual"
            }
        }
    });
    /* $("#formItemVenta").validate({});*/
</script>