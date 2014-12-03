<div class="row">
    <div class="col-md-12">
        <?php include_once 'views/gasto/abmGasto.php'; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php include_once 'views/gasto/listaGasto.php'; ?>
    </div>
</div>

<script type="text/javascript">
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    //Boton Agregar o modificar
        $('.editButtonGasto').click(function() {
        $('#ver').show("slow");
        $('html,body').animate({scrollTop: $("#ver").offset().top}, 2000);
        $('input[name=fechaGasto]').val($(this).data('fechagasto'));
        $('input[name=detalleGasto]').val($(this).data('detallegasto'));
        $('input[name=importeGasto]').val($(this).data('importegasto'));
        $('select[name=idProveedorGasto]').val($(this).data('idproveedorgasto'));
        $('select[name=idFormaPagoGasto]').val($(this).data('idformapagogasto'));
        $('input[name=idGasto]').val($(this).data('idgasto'));
        $('.btn-success').val('Modificar');
        $('.btn-danger').removeClass('no');
    });
    //Boton limpiar campos
    $('.btn-danger').click(function() {
        location.reload();
    });
    $("#formGastos").validate({
        rules: {
            FechaGasto: {
                required: true
            },
            detalleGasto: {
                required: true,
                minlength: 5
            },
            importeGasto: {
                required: true,
                number: true
            },
            idProveedorGasto: {
                required: true
            },
            idFormaPagoGasto: {
                required: true
            }
        },
        messages: {
            FechaGasto: {
                required: "Ingrese Fecha"
            },
            detalleGasto: {
                required: "Ingrese Detalle",
                minlength: "Debe mas de 5 caracteres"
            },
            importeGasto: {
                required: "Ingrese Importe",
                number: "Debe ser un numero"
            },
            idProveedorGasto: {
                required: "Ingrese Proveedor"
            },
            idFormaPagoGasto: {
                required: "Ingrese Temporada"
            }
        }
    });
</script>