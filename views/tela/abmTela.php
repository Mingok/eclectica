<?php 
				require_once 'classes/tela/tela.php';
				$telaList = new tela();
				$telas = $telaList->telasDisponibles();
				?>
<table >
	<tr style="vertical-align: middle;">
		<td style="text-align: left; " >
			<form action="actions/tela/guardarTela.php">
				<h2>Tela</h2>
				Nombre Color: &nbsp;<input type="text" name="detalleTela" placeholder="ingresar" style="width: 120px;"class="textCaracteristicas"/>
				<input type="submit" value="Agregar" class="buttonCaracteristicas"/>
			</form>
		</td>
	</tr>
	<tr>
		<td style="text-align: right;">
			<div class="scrolCaracteristicas"> 
				<table class="formuCaracteristicas" style="width: 100%;">
					<tr style="text-align: center;">
						<td>
							Mod
						</td>
						<td>
							Nombre
						</td>

					</tr>
					<?php 
					foreach ($telas as $tela) {
					?>					
					<tr style='text-align: center'>
						<td>
							<a  title='Modificar datos'><img src='./imagenes/iconos/edit.png' width='14' height='14' /></a>
						</td>
						<td>
							<?php echo $tela['detalleTela']?>
						</td>

					</tr>
					<?php }?>
				</table>
			</div>
		</td>
	</tr>
</table>