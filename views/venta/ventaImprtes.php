<?php
require_once 'classes/proveedor/proveedor.php';
$proveedorList = new proveedor ();
$proveedores = $proveedorList->proveedoresDisponibles ();
?>
<h1>Ventas</h1>
<div class="row">
<div class="col-md-12">
Area para elegir Importes 
</div>
</div>

    