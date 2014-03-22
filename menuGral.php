

 
<script>
	function mostrarOcultarTablas(id) {
		mostrado = 0;
		elem = document.getElementById(id);
		if (elem.style.display == 'block') mostrado = 1;
		elem.style.display = 'none';
		if (mostrado != 1) elem.style.display = 'block';
	}
</script>
<table  cellspacing="1px">
	<tr>
		<td width="100%">
			|
				<a href="javascript:mostrarOcultarTablas('configuracion')";>
                	<img src="./imagenes/iconos/reparacion.png" height="15px" title="Configuracion"/>
            		&nbsp;Configuracion&nbsp;
				</a>
		
            |
            	<a href="javascript:mostrarOcultarTablas('prendas')">
					<img src="./imagenes/iconos/1.png" height="15px" title="Prendas"/>
					&nbsp;Articulos&nbsp;
				</a>
			|
            	<a href="#">
					<img src="./imagenes/iconos/msg.png" height="15px" title="Ventas"/>
					&nbsp;Ventas&nbsp;
				</a>
			|
            	<a class="fancybox fancybox.iframe" href="indexCC.php">
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
	<table cellspacing="1px">
		<tr>
			<td>
				|
					<a href="./indexClientes.php" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Clientes&nbsp;
					</a>
				|
                <a href="./indexEmpleados.php" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Empleados&nbsp;
					</a>
				|<a href="#" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Proveedores&nbsp;
					</a>
				|
					<a href="#" onclick="javascript:mostrarOcultarTablas('configuracion')">
						&nbsp;Marcas&nbsp;
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
	<table cellspacing="1px">
		<tr>
			<td>|                    

            <a href="indexPrendas.php"onclick="javascript:mostrarOcultarTablas('prendas')">&nbsp;Prendas&nbsp;</a>
				|
				<a href="indexCaracteristicas.php" onclick="javascript:mostrarOcultarTablas('prendas')">&nbsp;Telas&nbsp;-&nbsp;Talles&nbsp;-&nbsp;Colores&nbsp;-&nbsp;Estampados&nbsp;</a>
				|
			</td>
          
		</tr>
	</table>
</div>