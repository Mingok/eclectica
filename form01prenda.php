<div class="row">
	<div class="col-md-12">
		<?php include_once 'views/prenda/listaPrenda.php'; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php include_once 'views/prenda/abmPrenda.php'; ?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
   $("#fancyboxPrecios").fancybox({
    autoDimensions:true,
    type   : 'iframe',
    openEffect  : 'fade',
    closeEffect : 'elastic'
  });
});

		//Boton Agregar o modificar
		$('.buttonCopiar').click(function() {
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
			$('input[name=codigoPrenda]').hide();
			$('label[for=codigoPrenda]').hide();
		});
		$('.editButtonPrenda').click(function() {
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
			$('input[name=codigoPrenda]').show("slow");
			$('label[for=codigoPrenda]').show("slow");
			$('.btn-success').val('Modificar');
			$('.btn-danger').removeClass('no');
		});
        $('#mostrarPrecios').click(function() {
    if ( <?php echo $tipoVentas["1"]["operacionTipoVenta"]; ?>=="0") {
        $('input[name=tipoVenta2]').val($('#idTipoVenta0').val());
    } else {
        if ( <?php echo $tipoVentas["1"]["operacionTipoVenta"]; ?>=="2") {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["1"]["porcentajeTipoVenta"] / 100; ?>));
            valor = valor + parseInt($('#idTipoVenta0').val());
            $('input[name=tipoVenta2]').val(valor);

        } else {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["1"]["porcentajeTipoVenta"] / 100; ?>));
            valor = parseInt($('#idTipoVenta0').val())-valor;
            $('input[name=tipoVenta2]').val(valor);
        }
    }
    if ( <?php echo $tipoVentas["2"]["operacionTipoVenta"]; ?>=="0") {
        $('input[name=tipoVenta3]').val($('#idTipoVenta0').val());
    } else {
        if ( <?php echo $tipoVentas["2"]["operacionTipoVenta"]; ?>=="2") {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["2"]["porcentajeTipoVenta"] / 100; ?>));
            valor = valor + parseInt($('#idTipoVenta0').val());
            $('input[name=tipoVenta3]').val(valor);

        } else {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["2"]["porcentajeTipoVenta"] / 100; ?>));
            valor = parseInt($('#idTipoVenta0').val())-valor;
            $('input[name=tipoVenta3]').val(valor);
        }
    }
   if ( <?php echo $tipoVentas["3"]["operacionTipoVenta"]; ?>=="0") {
        $('input[name=tipoVenta4]').val($('#idTipoVenta0').val());
    } else {
        if ( <?php echo $tipoVentas["3"]["operacionTipoVenta"]; ?>=="2") {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["3"]["porcentajeTipoVenta"] / 100; ?>));
            valor = valor + parseInt($('#idTipoVenta0').val());
            $('input[name=tipoVenta4]').val(valor);

        } else {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["3"]["porcentajeTipoVenta"] / 100; ?>));
            valor = parseInt($('#idTipoVenta0').val())-valor;
            $('input[name=tipoVenta4]').val(valor);
        }

    }
    if ( <?php echo $tipoVentas["4"]["operacionTipoVenta"]; ?>=="0") {
        $('input[name=tipoVenta5]').val($('#idTipoVenta0').val());
    } else {

        if ( <?php echo $tipoVentas["4"]["operacionTipoVenta"]; ?>=="2") {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["4"]["porcentajeTipoVenta"] / 100; ?>));
            valor = valor + parseInt($('#idTipoVenta0').val());
            $('input[name=tipoVenta5]').val(valor);

        } else {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["4"]["porcentajeTipoVenta"] / 100; ?>));
            valor = parseInt($('#idTipoVenta0').val())-valor;
            $('input[name=tipoVenta5]').val(valor);
        }
    }
    if ( <?php echo $tipoVentas["5"]["operacionTipoVenta"]; ?>=="0") {
        $('input[name=tipoVenta6]').val($('#idTipoVenta0').val());
    } else {
        if ( <?php echo $tipoVentas["5"]["operacionTipoVenta"]; ?>=="2") {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["5"]["porcentajeTipoVenta"] / 100; ?>));
            valor = valor + parseInt($('#idTipoVenta0').val());
            $('input[name=tipoVenta6]').val(valor);

        } else {
            valor = ($('#idTipoVenta0').val() * ( <?php echo $tipoVentas["5"]["porcentajeTipoVenta"] / 100; ?>));
            valor = parseInt($('#idTipoVenta0').val())-valor;
            $('input[name=tipoVenta6]').val(valor);
        }

    }

    $('#montoto').show("slow");
});
		//Boton limpiar campos
		$('.btn-danger').click(function() {
			location.reload();
		});
		$('.buttonPrendasNueva').click(function() {
		  $('#montoto').hide();
	   		$('#ver').show("slow");
    		$('html,body').animate({ scrollTop: $("#ver").offset().top}, 2000);
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
    		$('.btn-danger').addClass('no');
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
				}
			}
		});
</script>