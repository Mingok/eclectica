<h1 style="text-align: left;"> &nbsp;Clientes&nbsp; </h1>
<hr />
<table class="tablaClientes">
<tr style="height:180px;">
  <td >
  <table style="width:500px">
      <tr style="vertical-align: middle;">
        <td><table style= "width: 100%;">
            <tr>
              <td style="text-align: Left; "><h2>Cliente</h2></td>
              <td style="text-align: Right; "> Buscar: &nbsp;
                <select name="select" class="textClientes" style="width:350px">
                  <option selected="selected"> Carolina </option>
                  <option value="volvo"> Cintia </option>
                  <option value="saab"> Soledad </option>
                  <option value="mercedes"> Paula </option>
                </select>
              </td>
            </tr>
          </table>
          <div class="scrolEmpleado"  >
            <table class="formuClientes" style=
                "width: 100%;">
              <tr style="text-align: center;">
                <td width="53%"> Nombre </td>
                <td width="30%"> Telefono </td>
                <td    width="17%"> C. Corriente </td>
              </tr>
              <tr style="text-align: center;">
                <td > Carolina </td>
                <td> 0342 - 154426346 </td>
                <td> 800 </td>
              </tr>
              <tr style="text-align: center;">
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr style="text-align: center;">
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr style="text-align: center;">
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr style="text-align: center;">
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr style="text-align: center;">
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr style="text-align: center;">
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr style="text-align: center;">
                <td >&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </div>
		  </td>
		  
		  </tr>
		  </table>
        <td><table style="width:500px; height: 215px; border:solid">
            <tr style="vertical-align: middle;">
              <td style="text-align: center;"><h1>Datos del Cliente Seleccionado</h1></td>
            </tr>
          </table></td>
        <td style="text-align: right;" ><input type="button" name="pNuevo" value="Ver"
                class="buttonClientes" onclick="javascript:mostrarOcultarTablas('ver')"/>
          <br />
          <br />
          <input type="button" name="pNuevo" value="Agregar"
                class="buttonClientes" />
          <br />
          <br />
          <input type="button" name="pNuevo" value=
                "Modificar" class="buttonClientes" disabled="yes" />
        </td>
      </tr>
    </table>
    <br />
    <script>
		function mostrarOcultarTablas(id) {
			mostrado = 0;
			elem = document.getElementById(id);
			if (elem.style.display == 'block') mostrado = 1;
			elem.style.display = 'none';
			if (mostrado != 1) elem.style.display = 'block';
		}
	</script>
    <hr />
    <div id="ver" style="display: none; padding-top:10px; ">
      <table class="tablaClientes">
        <tr>
          <td colspan="7"><h1 style="text-align: left;"> Historial de Compras - Cuenta Corriente - Carolina </h1></td>
        </tr>
        <tr style="vertical-align: middle;">
          <td style="text-align: right;"> Tipo de venta:&nbsp;
            <select name="select" class="textClientes">
              <option selected="selected"> --- </option>
              <option value="volvo"> Contado </option>
              <option value="saab"> Contado 10% </option>
              <option value="mercedes"> Tarjeta </option>
              <option value="audi"> CC </option>
            </select>
          </td>
          <td style="text-align: right;"> Desde: &nbsp;
            <input type="date" value="<?php
echo date('Y-m-d');
?>" 
          class="textClientes"/>
          </td>
          <td style="text-align: right;"> Hasta:&nbsp;
            <input type="date" value="<?php
echo date('Y-m-d');
?>" 
          class="textClientes" />
          </td>
          <td style="text-align: right;"> Min: &nbsp;
            <input type="text" maxlength="6" name=
          "pNuevo" value="100,00" class="textClientes" size=
          "8" />
          </td>
          <td style="text-align: right;"> Max: &nbsp;
            <input type="text" maxlength="6" name=
          "pNuevo" value="100,00" class="textClientes" size=
          "8"  />
          </td>
          <td style="text-align: Center; height: 40px;" rowspan="2"  ><input type="button" name="pNuevo" value="Buscar" class=
          "buttonClientes" />
          </td>
        </tr>
      </table>
      <br />
      <table class="tablaClientes" >
        <tr>
          <td><table class="formuClientes" style="width:800px">
              <tr style="text-align: center;">
                <td> Fecha </td>
                <td> Dev </td>
                <td> Camb </td>
                <td> Prenda / Entrega </td>
                <td> Cant. </td>
                <td> Precio </td>
                <td> Entrega </td>
                <td> Saldo </td>
              </tr>
              <tr style="text-align: center;">
                <td>21-03-2014</td>
                <td><a  title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='14' height='14' /></a> </td>
                <td><a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='14' height='14' /></a> </td>
                <td>Comba 3/4</td>
                <td>1</td>
                <td>200,00</td>
                <td>---</td>
                <td>200</td>
              </tr>
              <tr style="text-align: center;" bgcolor="#00FFFF" >
                <td style="text-align: left;" colspan="6" >23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA</td>
                <td>100,00</td>
                <td>100,00 </td>
              </tr>
              <tr style="text-align: center;">
                <td>21-03-2014</td>
                <td><a  title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='14' height='14' /></a> </td>
                <td><a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='14' height='14' /></a> </td>
                <td>Comba 3/4</td>
                <td>1</td>
                <td>200,00</td>
                <td>---</td>
                <td>300,00</td>
              </tr>
              <tr style="text-align: center;" bgcolor="#00FFFF" >
                <td style="text-align: left;" colspan="6" >23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA</td>
                <td>100,00 </td>
                <td>200,00</td>
              </tr>
              <tr style="text-align: center;" bgcolor="#00FFFF" >
                <td style="text-align: left;" colspan="6" >23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA</td>
                <td>100,00 </td>
                <td>100,00 </td>
              </tr>
              <tr style="text-align: center;">
                <td>21-03-2014</td>
                <td><a  title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='14' height='14' /></a> </td>
                <td><a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='14' height='14' /></a> </td>
                <td>Comba 3/4</td>
                <td>1</td>
                <td>200,00</td>
                <td>---</td>
                <td>300,00</td>
              </tr>
              <tr style="text-align: center;" bgcolor="#00FFFF" >
                <td style="text-align: left;" colspan="6" >23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA</td>
                <td>100,00 </td>
                <td>200,00 </td>
              </tr>
              <tr style="text-align: center;" bgcolor="#00FFFF" >
                <td style="text-align: left;" colspan="6" >23/03/2014&nbsp;&nbsp;&nbsp;&nbsp;ENTREGA</td>
                <td>100,00</td>
                <td>200,00 </td>
              </tr>
              <tr style="text-align: center;">
                <td>21-03-2014</td>
                <td><a  title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='14' height='14' /></a> </td>
                <td><a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='14' height='14' /></a> </td>
                <td>Comba 3/4</td>
                <td>1</td>
                <td>200,00</td>
                <td>---</td>
                <td>400,00</td>
              </tr>
              <tr style="text-align: center;">
                <td>21-03-2014</td>
                <td><a  title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='14' height='14' /></a> </td>
                <td><a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='14' height='14' /></a> </td>
                <td>Comba 3/4</td>
                <td>1</td>
                <td>200,00</td>
                <td>---</td>
                <td>600,00</td>
              </tr>
              <tr style="text-align: center;">
                <td>21-03-2014</td>
                <td><a  title='Modificar datos'><img src='imagenes/iconos/retorno.png' width='14' height='14' /></a> </td>
                <td><a title='Borrar'><img src='imagenes/iconos/descarga.jpg' width='14' height='14' /></a> </td>
                <td>Comba 3/4</td>
                <td>1</td>
                <td>200,00</td>
                <td>---</td>
                <td>800,00</td>
              </tr>
              <tr style="text-align: center;" bgcolor="#ffff00" >
                <td style="text-align: right;" colspan="7"><div style=" font-weight:bolder"> Saldo</div></td>
                <td><div style=" font-weight:bolder">800,00</div></td>
              </tr>
            </table></td>
          <td><table style="width:300px" border="1">
              <tr style="vertical-align: middle;">
                <td style="text-align: center;"><br />
                  <h1> Actualizar CC</h1>
                  <br />
                  Entrega: &nbsp;
                  <input type="text" name="pbusc" value="ingresar" style="width: 120px;" class="textCaracteristicas"/>
                  <br />
                  <br />
                  <input type="button" name="pNuevo" value="Buscar" class="buttonClientes" />
                  <br />
                  <br />
                </td>
              </tr>
            </table>
			</div>
			</td>
        </tr>
      </table>
    
