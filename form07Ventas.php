<div class="row">
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<?php include_once './views/venta/ventaCliente.php'?>
			</div>
			<div class="col-md-12">
				<?php include_once './views/venta/ventaPrenda.php'?>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="row">
<!--			<div class="col-md-12">
				<?php include_once 'views/venta/ventaHistoricoCliente.php'; ?>
			</div> -->
			<div class="col-md-12">
				<?php include_once './views/venta/ventaDetalle.php'?>
			</div>
<!--			<div class="col-md-12">
				<?php include_once './views/venta/ventaImprtes.php'?>
			</div>-->
		</div>
	</div> 
</div>
<script type="text/javascript">
    $(document).ready(function(){
        fn_dar_eliminar();
        fn_cantidad();
        $('#agregarItem').hide();
    });
</script>   