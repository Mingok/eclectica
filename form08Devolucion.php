<div class="row">
    <div class="col-md-12 cliente-prendas">
        <div class="row">
            <div class="col-md-4">
                <?php include_once './views/devolucion/devolucionCliente.php' ?>
            </div>
            <div class="col-md-8 historico-compras">
                <?php include_once './views/venta/ventaHistoricoCliente.php'; ?>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 ">
                <?php include_once './views/devolucion/devolucionItemCambioUI.php'; ?>
            </div>
        </div>
    </div>
<input type="hidden" id="estaVenta" name="estaVenta" >


</div>


<script type="text/javascript">

    var estado = 0; /*selecCliente*/
    var pasar = 0;
    var pasar1 = 0;

    $(document).ready(function () {
        var estado = 1; /*selecCliente*/
        $('#selecClientes').on("change", function (e) {
            $('#clienteVenta').val(this.options[this.selectedIndex].text);
            $('#idClienteVenta').val(this.value);
            $("#cliente1").html(this.options[this.selectedIndex].text);
            $('#selecClientes').empty().attr("disabled", "disabled");
            $('#prendasDevolucion').show();
        });

        var pasar2 = 0;
        $("#selecEmpleados").on("change", function (e) {
            var auxiliar = this.value;
            $('#idVendedor').val(this.value);
            $('#selecClientes option[value="' + auxiliar + '"]').addClass("hide_me");

            $("#selecEmpleados").empty().attr("disabled", "disabled");


        });
    });

    $(document).ready(function () {
        $('#selecEmpleados').select2({
            placeholder: "Seleccionar",
            allowClear: true
        });
        $('#selecClientes').select2({
            placeholder: "Seleccionar",
            allowClear: true
        });
        $('#prendasDevolucion').hide();
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
            submitHandler: function (form) {
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
</script>