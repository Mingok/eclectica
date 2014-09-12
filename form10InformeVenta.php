<div class="row">
    <div class="col-md-12">
        <?php include_once 'views/informe/listaInformeVenta.php'; ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#selecEmpleado, #selecCliente').select2({
            placeholder: "Seleccionar",
            allowClear: true
        }); 
    });
</script>