<?php 
    extract($_GET,EXTR_SKIP) ;    
    extract($_POST,EXTR_SKIP) ; 
    include ( "conectar.php");
   
?>

 
<script>
	function mostrarOcultarTablas(id) {
		mostrado = 0;
		elem = document.getElementById(id);
		if (elem.style.display == 'block') mostrado = 1;
		elem.style.display = 'none';
		if (mostrado != 1) elem.style.display = 'block';
	}
</script>
<table style="width: 890px; " cellspacing="0">
	<tr>
		<td width="100%">
			|
				<a href="javascript:mostrarOcultarTablas('configuracion')";>
                	<img src="./imagenes/iconos/reparacion.png" height="15px" title="Configuracion"/>
            		&nbsp;Configuracion&nbsp;
				</a>
		
            |
            	<a href="javascript:mostrarOcultarTablas('prendas')">
					<img src="./imagenes/iconos/1.png" height="15px" title="Articulos"/>
					&nbsp;Articulos&nbsp;
				</a>
			|
            	<a href="#">
					<img src="./imagenes/iconos/msg.png" height="15px" title="Ventas"/>
					&nbsp;Ventas&nbsp;
				</a>
			|
            	<a href="#">
					<img src="./imagenes/iconos/25.png" height="15px" title="Cuentas Corrientes"/>
					&nbsp;Cuentas Corrientes&nbsp;
				</a>
			|
			<a href="#"><img src="./imagenes/iconos/24.png" height="15px" title="Informes"/>&nbsp;Informes&nbsp;</a>
			|
                <a href="./help/index.html" target="_blank"><img src="./imagenes/iconos/ayuda4.png" height="15px" title="Ayuda"/>&nbsp;Ayuda&nbsp;</a>
            |
		</td>
  	</tr>
</table>
<div id="configuracion" style="display: none;padding-top:10px; padding-left:25px">
	<table style="width: 870px; " cellspacing="0">
		<tr>
			<td>
				|
					<a href="#" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Proveedores&nbsp;
					</a>
				|
					<a href="#" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Marcas&nbsp;
					</a>
	            |
					<a href="#" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Empleados&nbsp;
					</a>
				|
                	<a href="#" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Listas De Precios&nbsp;
					</a>
				|
            	
			</td>
          
		</tr>
	</table>
</div>
<div id="prendas" style="display: none;padding-top:10px; padding-left:125px">
	<table style="width: 870px; " cellspacing="0">
		<tr>
			<td>|
            <a href="empresas.php?filtro=R.%20Soc&orden=razon_social_empresa" onclick="javascript:mostrarOcultarTablas('prendas')">&nbsp;Prendas&nbsp;</a>
				|
				<a href="vehiculos.php?filtro=Chasis&orden=dominio_chasis_vehiculo" onclick="javascript:mostrarOcultarTablas('prendas')">&nbsp;Telas&nbsp;</a>
	            |
				<a href="empleados.php?orden=id_empleado&filtro=Legajo" onclick="javascript:mostrarOcultarTablas('prendas')">&nbsp;Talles&nbsp;</a>
				|
                <a href="recorridos.php?filtro=Codigo&orden=codigo_recorrido" onclick="javascript:mostrarOcultarTablas('prendas')">&nbsp;Color&nbsp;</a>
				|
            	 <a href="recorridos.php?filtro=Codigo&orden=codigo_recorrido" onclick="javascript:mostrarOcultarTablas('prendas')">&nbsp;Estampados&nbsp;</a>
				|
			</td>
          
		</tr>
	</table>
</div>