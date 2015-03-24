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
                <img style="padding-top: 3px;" src="./imagenes/logos/<?php echo $empresa['logoEmpresa']; ?>" height="40px" />
            </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">
                        <img src="./imagenes/iconos/home.png" height='24px' title="Inicio" />
                        &nbsp;Inicio&nbsp;
                    </a>    
                </li>
                <li>
                    <a href="./indexPrendas.php?pasar=<?php echo $_SESSION['pasar']; ?>">
                        <img src="./imagenes/iconos/1.png" height='24px' title="Prendas" />
                        &nbsp;Prendas&nbsp;
                    </a>
                </li>
                <li>
                    <a href="./indexVenta.php?pasar=<?php echo $_SESSION['pasar']; ?>">
                        <img src="./imagenes/iconos/venta1.png" height='24px' title="Ventas" />
                        &nbsp;Ventas&nbsp;
                    </a>
                </li>
                <li>
                    <a href="./indexDevolucion.php?pasar=<?php echo $_SESSION['pasar']; ?>">
                        <img src="./imagenes/iconos/devol.png" height='24px' title="Devolucion" />
                        &nbsp;Devolucion&nbsp;
                    </a>
                </li>
                <li>
                    <a id="fancyboxCC" class="fancyboxCC" href="form05CC.php">
                        <img src="./imagenes/iconos/25.png" height='24px' title="Cuentas Corrientes" />
                        &nbsp;Cuenta Corriente&nbsp;
                    </a>
                </li>
                <li>
                    <a href="./indexGastos.php?pasar=<?php echo $_SESSION['pasar']; ?>">
                        <img src="./imagenes/iconos/informes.png" height='24px' title="Gastos" />
                        &nbsp;Gastos&nbsp;
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"	data-toggle="dropdown"> 
                        <img src="./imagenes/iconos/time.png" height='24px' title="Informes" />
                        &nbsp;Informes&nbsp;
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="./indexInformePrenda.php?pasar=<?php echo $_SESSION['pasar']; ?>">&nbsp;Existencias&nbsp;</a></li>
                        <li><a href="./indexInformeVenta.php?pasar=<?php echo $_SESSION['pasar']; ?>"> &nbsp;Ventas&nbsp;</a></li>
                        <li><a href="./indexInformeGasto.php?pasar=<?php echo $_SESSION['pasar']; ?>"> &nbsp;Gastos&nbsp;</a></li>
                        <li class="divider"></li>
                        <li><a href="./indexInformeResumen.php?pasar=<?php echo $_SESSION['pasar']; ?>"> &nbsp;Resumen&nbsp;</a></li>

                    </ul>
                </li>
                <!--  	<li>
                  <a href="#">
                        <img src="./imagenes/iconos/24.png" width='24px' height='24px' title="Informes" />
                        &nbsp;Informes&nbsp;
                    </a>
                </li>
                        <li>
                    <a href="./help/index.html" target="_blank">
                        <img src="./imagenes/iconos/ayuda4.png" width='24px' height='24px' title="Ayuda" />
                        &nbsp;Ayuda&nbsp;
                    </a>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"	data-toggle="dropdown"> 
                        <img src="./imagenes/iconos/reparacion.png" height='24px' title="Configuracion" />
                        &nbsp;Configuracion&nbsp;
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="./indexClientes.php">&nbsp;Clientes&nbsp;</a></li>
                        <li><a href="./indexEmpleados.php?pasar=<?php echo $_SESSION['pasar']; ?>"> &nbsp;Empleados&nbsp;</a></li>
                        <li><a href="./indexProv.php?pasar=<?php echo $_SESSION['pasar']; ?>">&nbsp;Proveedores&nbsp; </a></li>
                        <li><a href="./indexProv.php?pasar=<?php echo $_SESSION['pasar']; ?>#Empresa">&nbsp;Empresa&nbsp; </a></li>
                        <li class="divider"></li>
                        <li><a href="indexCaracteristicas.php?pasar=<?php echo $_SESSION['pasar']; ?>">&nbsp;Caracteristicas&nbsp;</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse --></div>
</div>
<script type="text/javascript">

    $(".fancyboxCC").fancybox({
        maxWidth: 900,
        minHeight: 490,
        autoScale: true,
        
                type: 'iframe',
        closeEffect: 'elastic'

    });
</script>