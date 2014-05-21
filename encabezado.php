<?php 
	require_once 'classes/empresa/empresa.php'; 
	$empresaList = new empresa(); 
	$empresas = $empresaList->datosEmpresa();
	$empresa = null;
	if (is_array($empresas)) {
		$empresa = array_shift($empresas);
	}
?>
<div class="navbar navbar-inverse navbar-fixed-top" style="top: 2px;">
<div class="container">
<div class="navbar-header">
    <a href="index.php">
        <img style="padding-top: 3px;" src="./imagenes/logos/<?php echo $empresa['logoEmpresa'];?>" height="46px" />
    </a>
</div>
<div class="navbar-collapse collapse">
	<ul class="nav navbar-nav">
		<li>
            <a href="index.php">
                <img src="./imagenes/iconos/home.png" width='18px' height='18px' title="Inicio" />
                &nbsp;Inicio&nbsp;
            </a>
        </li>
		<li>
            <a href="indexPrendas.php">
                <img src="./imagenes/iconos/1.png" width='18px' height='18px' title="Prendas" />
                &nbsp;Prendas&nbsp;
            </a>
        </li>
		<li>
            <a href="#">
                <img src="./imagenes/iconos/venta.png" width='18px' height='18px' title="Ventas" />
                &nbsp;Ventas&nbsp;
            </a>
        </li>
		<li>
            <a class="fancybox fancybox.iframe" href="form05CC.php">
                <img src="./imagenes/iconos/25.png" width='18px' height='18px' title="Cuentas Corrientes" />
                &nbsp;Cuenta Corriente&nbsp;
            </a>
        </li>
		<li>
            <a href="#">
                <img src="./imagenes/iconos/24.png" width='18px' height='18px' title="Informes" />
                &nbsp;Informes&nbsp;
            </a>
        </li>
		<li>
            <a href="./help/index.html" target="_blank">
                <img src="./imagenes/iconos/ayuda4.png" width='18px' height='18px' title="Ayuda" />
                &nbsp;Ayuda&nbsp;
            </a>
        </li>
		<li class="dropdown">
            <a href="#" class="dropdown-toggle"	data-toggle="dropdown"> 
                <img src="./imagenes/iconos/reparacion.png" width='18px' height='18px' title="Configuracion" />
                &nbsp;Configuracion&nbsp;
                <b class="caret"></b>
            </a>
		<ul class="dropdown-menu">
			<li><a href="./indexClientes.php">&nbsp;Clientes&nbsp;</a></li>
			<li><a href="./indexEmpleados.php"> &nbsp;Empleados&nbsp;</a></li>
			<li><a href="./indexProv.php">&nbsp;Proveedores&nbsp; </a></li>
			<li><a href="./indexProv.php#Empresa">&nbsp;Empresa&nbsp; </a></li>
			<li class="divider"></li>
			<li><a href="indexCaracteristicas.php">&nbsp;Caracteristicas&nbsp;</a></li>
		</ul>
		</li>
	</ul>
</div>
<!--/.nav-collapse --></div>
</div>



	<script type="text/javascript">

	$(document).ready(function() {
        $(".fancybox").fancybox();
	});
</script>