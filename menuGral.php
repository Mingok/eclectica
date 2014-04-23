
<script type="text/javascript" src="./fancy/lib/jquery-1.10.1.min.js">
</script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="./fancy/lib/jquery.mousewheel-3.0.6.pack.js">
</script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="./fancy/source/jquery.fancybox.js?v=2.1.5">
</script>
<link rel="stylesheet" type="text/css" href="./fancy/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {

	});
	$(document).ready(function() {
/*
			 *  Simple image gallery. Uses default settings
			 */

		$('.fancybox').fancybox();



		// Disable opening and closing animations, change title type
		$(".fancybox-effects-b").fancybox({
			openEffect: 'none',
			closeEffect: 'none',

			helpers: {
				title: {
					type: 'over'
				}
			}
		});


/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

		$('.fancybox-buttons').fancybox({
			openEffect: 'none',
			closeEffect: 'none',

			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: false,

			helpers: {

				title: {
					type: 'inside'
				},
				buttons: {}
			},

			afterLoad: function() {
				this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
			}
		});


/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

		$('.fancybox-thumbs').fancybox({
			prevEffect: 'none',
			nextEffect: 'none',

			closeBtn: false,
			arrows: false,
			nextClick: true,

			helpers: {
				thumbs: {
					width: 50,
					height: 50
				}
			}
		});

/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
		$('.fancybox-media').attr('rel', 'media-gallery').fancybox({
			openEffect: 'none',
			closeEffect: 'none',
			prevEffect: 'none',
			nextEffect: 'none',

			arrows: false,
			helpers: {
				media: {},
				buttons: {}
			}
		});



		$("#fancybox-manual-b").click(function() {

			$.fancybox.open({
				href: 'form05CC.php',
				type: 'iframe',

				padding: 5
			});

		});
	
		$(".fancybox").fancybox({
			closeClick: false,
			// prevents closing when clicking INSIDE fancybox 
			openEffect: 'none',
			closeEffect: 'none',
			helpers: {
				overlay: {
					closeClick: false
				} // prevents closing when clicking OUTSIDE fancybox 
			}
		})


	});
</script>
<style type="text/css">
	.fancybox-custom .fancybox-skin {
	box-shadow:0 0 50px #222;
	}
</style>
<script>
	function mostrarOcultarTablas(id) {
		mostrado = 0;
		elem = document.getElementById(id);
		if (elem.style.display == 'block') mostrado = 1;
		elem.style.display = 'none';
		if (mostrado != 1) elem.style.display = 'block';
	}
</script>
<table cellspacing="1px">
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
			
			|
			
			|
		</td>
	</tr>
</table>
<div id="configuracion" style="display: none;padding-top:10px; padding-left:25px">
	<table cellspacing="1px">
		<tr>
			<td>
				|
				<a href="./indexClientes.php" onclick="javascript:mostrarOcultarTablas('configuracion')" style="font-style: italic; ">
				&nbsp;Clientes&nbsp;
				</a>
				|
				<a href="./indexEmpleados.php" onclick="javascript:mostrarOcultarTablas('configuracion')" style="font-style: italic; ">
				&nbsp;Empleados&nbsp;
				</a>
				|
				<a href="./indexProv.php" onclick="javascript:mostrarOcultarTablas('configuracion')" style="font-style: italic; " >
				&nbsp;Proveedores&nbsp;
			     </a>
				|
			
                <a href="#" onclick="javascript:mostrarOcultarTablas('configuracion')">
				&nbsp;Marcas&nbsp;
				</a>
				|
			</td>
		</tr>
	</table>
</div>
<div id="prendas" style="display: none;padding-top:10px; padding-left:125px">
	<table cellspacing="1px">
		<tr>
			<td>
				|
				<a href="indexPrendas.php"onclick="javascript:mostrarOcultarTablas('prendas')"style="font-style: italic; ">&nbsp;Prendas&nbsp;</a>
				|
				<a href="indexCaracteristicas.php" onclick="javascript:mostrarOcultarTablas('prendas')"style="font-style: italic; ">&nbsp;Caracteristicas&nbsp;</a>
				|
			</td>
		</tr>
	</table>
</div>