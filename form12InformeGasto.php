<div class="row">
    <div class="col-md-12">
        <?php include_once 'views/informe/listaInformeGasto.php'; ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#idProveedorGasto, #idFormaPagoGasto').select2({
            placeholder: "Seleccionar",
            allowClear: true
        }); 
    });
</script>