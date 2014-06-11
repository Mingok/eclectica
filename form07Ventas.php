<div class="row">
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<?php include_once './views/venta/ventaCliente.php'?>
			</div>
			<div class="col-md-12">
				<?php include_once './views/venta/ventaItemVenta.php'?>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12" id="ventaHistoricoCliente">
				<?php include_once 'views/venta/ventaHistoricoCliente.php'; ?>
			</div>
			<div class="col-md-12" id="ventaDetalle">
            
				<?php include_once './views/venta/ventaDetalle.php'?>
			</div>
			<div class="col-md-12">
				<?php include_once './views/venta/ventaImprtes.php'?>
			</div>
		</div>
	</div> 
</div>
<script type="text/javascript">
	$(document).ready(function() {
		var estado = 1; /*selecCliente*/
		$('#selecCliente').select2({
			placeholder: "Seleccionar",
			allowClear: true
		});
        
        $('#selecCliente').on("change", function(e) {
            $('#clienteVenta').val(this.options[e.val].text);
            $("#cliente1").html(this.options[e.val].text);
        });

		/*selecCondicionGral*/
		$('#selecCondicionGral').select2({
			placeholder: "Seleccionar",
			allowClear: true
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
		}); /*selecCondicionGral*/

		/*selecCondicionItem*/
		$('#selecCondicionItem').select2({
			placeholder: "Seleccionar",
			allowClear: true
		});
		$("#selecCondicionItem").empty().attr("disabled", "disabled"); /*selecCondicionItem*/
		$('#agregarItem').hide();
		$('#ventaHistoricoCliente').hide();
		$('#historial').click(function() {
			if (estado) {
				estado = 0;
				$('#ventaHistoricoCliente').show("slow");
				$('#ventaDetalle').hide();
			} else {
				estado = 1;
				$('#ventaHistoricoCliente').hide();
				$('#ventaDetalle').show();
			}
		});
        
        
        
	});
</script>