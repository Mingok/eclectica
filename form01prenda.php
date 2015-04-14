<?php
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
?>
<div class="row">
    <div class="col-md-12">
        <?php include_once 'views/prenda/listaPrendaUI.php'; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php include_once 'views/prenda/abmPrenda.php'; ?>
    </div>
</div>
<script type="text/javascript">
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    $(document).ready(function () {
        $("#exitoPrenda").hide();
        mostrar = getParameterByName('prendaNueva');

        mostrar1 = "Prenda NUEVA: " + getParameterByName('NPrenda') + "<a href='./indexPrendas.php?pasar=1'> <img src='./imagenes/iconos/delete.png' /></a>";

        if (mostrar == 'ok') {
            $("#exitoPrenda").show("slow");

            $("#CPrenda").html(mostrar1);
        }
        $("#fancyboxPrecios").fancybox({
            autoDimensions: true,
            type: 'iframe',
            openEffect: 'fade',
            closeEffect: 'elastic'
        });
    });

    //Boton Agregar o modificar
    $('.buttonCopiar').click(function () {
        $('#ver').show("slow");
        $('html,body').animate({scrollTop: $("#ver").offset().top}, 2000);
        $('.buttonPrendas').val('Agregar');
        $('input[name=idPrenda]').val('');
         $('input[name=idPrenda]').val(null);
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
    $('.editButtonPrenda').click(function () {
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
    $('#mostrarPrecios').click(function () {
        $('#idTipoVenta2').val(Math.round($('#idTipoVenta2').val()));
        
        
        if (<?php echo $tipoVentas["2"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta3]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["2"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["2"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta3]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["2"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta3]').val(Math.round(valor));
            }
        }

        if (<?php echo $tipoVentas["3"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta4]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["3"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["3"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta4]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["3"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta4]').val(Math.round(valor));
            }

        }
        if (<?php echo $tipoVentas["4"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta5]').val($('#idTipoVenta2').val());
        } else {

            if (<?php echo $tipoVentas["4"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["4"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta5]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["4"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta5]').val(Math.round(valor));
            }
        }
        if (<?php echo $tipoVentas["5"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta6]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["5"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["5"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta6]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["5"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta6]').val(Math.round(valor));
            }

        }

        if (<?php echo $tipoVentas["6"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta7]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["6"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["6"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta7]').val(Math.round(valor));
            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["6"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta7]').val(Math.round(valor));
            }

        }
        if (<?php echo $tipoVentas["7"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta8]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["7"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["7"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta8]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["7"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta8]').val(Math.round(valor));
            }

        }
        if (<?php echo $tipoVentas["8"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta9]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["8"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["8"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta9]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["8"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta9]').val(Math.round(valor));
            }

        }
        if (<?php echo $tipoVentas["9"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta10]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["9"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["9"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta10]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["9"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta10]').val(Math.round(valor));
            }

        }
        if (<?php echo $tipoVentas["10"]["operacionTipoVenta"]; ?> == "0") {
            $('input[name=tipoVenta11]').val($('#idTipoVenta2').val());
        } else {
            if (<?php echo $tipoVentas["10"]["operacionTipoVenta"]; ?> == "2") {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["10"]["porcentajeTipoVenta"] / 100; ?>));
                valor = valor + parseInt($('#idTipoVenta2').val());
                $('input[name=tipoVenta11]').val(Math.round(valor));

            } else {
                valor = ($('#idTipoVenta2').val() * (<?php echo $tipoVentas["10"]["porcentajeTipoVenta"] / 100; ?>));
                valor = parseInt($('#idTipoVenta2').val()) - valor;
                $('input[name=tipoVenta11]').val(Math.round(valor));
            }
        }
        $('#montoto').show("slow");
        $('html,body').animate({scrollTop: $("#montoto").offset().top}, 2000);
    });
    //Boton limpiar campos
    $('.btn-danger').click(function () {
        location.reload();
    });
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
    $("#formPrendas").validate({
        rules: {
            idEstacionPrenda: {
                required: true

            },
            idMarcaPrenda: {
                required: true

            },
            idProveedorPrenda: {
                required: true

            },
            idTemporadaPrenda: {
                required: true

            },
            idTelaPrenda: {
                required: true
            },
            idTallePrenda: {
                required: true
            },
            idColorPrenda: {
                required: true

            },
            cantidadPrenda: {
                required: true

            },
            idEstampadoPrenda: {
                required: true

            },
            detallePrenda: {
                required: true,
                minlength: 5
            },
            tipoVenta1: {
                required: true,
                number: true
            },
            tipoVenta2: {
                required: true,
                number: true
            },
            tipoVenta3: {
                required: true,
                number: true
            },
            tipoVenta4: {
                required: true,
                number: true
            },
            tipoVenta5: {
                required: true,
                number: true
            },
            tipoVenta6: {
                required: true,
                number: true
            },
            tipoVenta7: {
                required: true,
                number: true
            },
            tipoVenta8: {
                required: true,
                number: true
            },
            tipoVenta9: {
                required: true,
                number: true
            },
            tipoVenta10: {
                required: true,
                number: true
            },
            tipoVenta11: {
                required: true,
                number: true
            },
        },
        messages: {
            idTemporadaPrenda: {
                required: "Ingrese Estacion",
            },
            idMarcaPrenda: {
                required: "Ingrese Marca",
            },
            idEstampadoPrenda: {
                required: "Ingrese Estampado",
            },
            idProveedorPrenda: {
                required: "Ingrese Proveedor",
            },
            idTemporadaPrenda: {
                required: "Ingrese Temporada",
            },
                    idTelaPrenda: {
                        required: "Ingrese Tela",
                    },
            idTallePrenda: {
                required: "Ingrese Talle",
            },
            idColorPrenda: {
                required: "Ingrese Color",
            },
            cantidadPrenda: {
                required: "Ingrese Cantidad",
            },
            detallePrenda: {
                required: "Ingrese Nombre",
                minlength: "Debe mas de 5 caracteres"
            },
            tipoVenta1: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta2: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta3: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta4: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta5: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta6: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta7: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            }
            , tipoVenta8: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta9: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta10: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            },
            tipoVenta11: {
                required: "Ingrese Precio",
                number: "Debe ser un numero"
            }
        }
    });
</script>