
  <h1 style="text-align: left;">
    &nbsp;Empleados&nbsp;
  </h1>
  <hr />
  <div style="padding-bottom: 10px">
    <table class="tablaEmpleados">
    <tr style="height:180px;">
        <td >
          <table style="width:500px">
          <tr style="vertical-align: middle;">
            <td>
			<div class="scrolEmpleado"  >
              <table class="formuEmpleados" style=
                "width: 100%;">
                  <tr style="text-align: center;">
                    <td width="60%">
                      Nombre
                    </td>
                    <td>
                      Objetivo
                    </td>
                    <td>
                      Monto
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">
                      Carina
                    </td>
                    <td>
                      Mensual
                    </td>
                    <td>
                      10000
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                  </tr>
                  
                  <tr style="text-align: center;">
                    <td width="60%">&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                    <td>&nbsp;
                      
                    </td>
                  </tr>
                </table>
                </div>
        </td>
     
        <td>
          <table style="width:500px; height: 170px; border:solid">
                   <tr style="vertical-align: middle;">
              <td style="text-align: center;">
                <h1>Datos del empleado Seleccionado</h1>
              </td>
            </tr>
          </table>
        </td>
           <td style="text-align: right;" >
                <input type="button" name="pNuevo" value="Agregar"
                class="buttonEmpleados" />
              <br /><br />
                <input type="button" name="pNuevo" value=
                "Modificar" class="buttonEmpleados" disabled="yes" />
             
        
        
                </td>
      </tr>
    </table>
    <br />
    <table class="tablaEmpleados">
    <tr>
        <td colspan="7">
          <h1 style="text-align: left;">
            Historial de Ventas <strong><em>Carina</em></strong>
          </h1>
        </td>
      </tr>
      <tr style="vertical-align: middle;">
        <td style="text-align: right;">
          Cliente:&nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="saab">
              Raquel Sanches
            </option>
            <option value="mercedes">
              CLaudua Peres
            </option>
            <option value="audi">
              Patricia Ortiz
            </option>
          </select>
        </td>
        
        <td style="text-align: right;">
          Tipo de venta:&nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="volvo">
              Contado
            </option>
            <option value="saab">
              Contado 10%
            </option>
            <option value="mercedes">
              Tarjeta
            </option>
            <option value="audi">
              CC
            </option>
          </select>
        </td>
       <td style="text-align: right;">
          Desde: &nbsp; <input type="date" value="<?php echo date('Y-m-d')?>" 
          class="textEmpleados"/>
        </td>
        <td style="text-align: right;">
          Hasta:&nbsp; <input type="date" value="<?php echo date('Y-m-d')?>" 
          class="textEmpleados" />
        </td>
        <td style="text-align: Center; height: 40px;" rowspan="3"  >
          <input type="button" name="pNuevo" value="Buscar" class=
          "buttonEmpleados" />
        </td>
      </tr>
      <tr style="vertical-align: middle;">
         <td style="text-align: right;">
          Prenda:&nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="saab">
              Pantalon
            </option>
            <option value="mercedes">
              Sosten
            </option>
            <option value="audi">
              Colales
            </option>
          </select>
        </td>
 <td style="text-align: right;">
          Marca: &nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="volvo">
              Marca 1
            </option>
            <option value="saab">
              Marca 2
            </option>
            <option value="mercedes">
              Marca 3
            </option>
          </select>
        </td>
        <td style="text-align: right;">
          Min: &nbsp; <input type="text" maxlength="6" name=
          "pNuevo" value="100,00" class="textEmpleados" size=
          "8" />
        </td>
        <td style="text-align: right;">
          Max: &nbsp; <input type="text" maxlength="6" name=
          "pNuevo" value="100,00" class="textEmpleados" size=
          "8"  />
        </td>
        </tr>
      <tr style="vertical-align: middle;">
        <td style="text-align: right;">
          Color: &nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="volvo">
              Rojo
            </option>
            <option value="saab">
              Verde
            </option>
            <option value="mercedes">
              Marron
            </option>
          </select>
        </td>
        <td style="text-align: right;">
          Talle: &nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="volvo">
              XXXL
            </option>
            <option value="saab">
              S
            </option>
            <option value="mercedes">
              42
            </option>
          </select>
        </td>
        <td style="text-align: right;">
          Tela: &nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="volvo">
              Lana Fria
            </option>
            <option value="saab">
              Gabardina
            </option>
            <option value="mercedes">
              Hilo
            </option>
          </select>
        </td>
        <td style="text-align: right;">
          Textura: &nbsp; <select name="select" class="textEmpleados">
            <option selected="selected">
              ---
            </option>
            <option value="volvo">
              Rayado
            </option>
            <option value="saab">
              Lunares
            </option>
            <option value="mercedes">
              Animal Print
            </option>
          </select>
        </td>
       
      </tr>
    </table>
    <br />  
    <table class="tablaEmpleados">
    <tr>
    <td>
    <table class="formuEmpleados" style="width:100%">
      <tr style="text-align: center;">
        <td>
          Fecha
        </td>
        <td>
          Cliente
        </td>
        <td colspan="3" style="width:250px; text-align:center" >
          Prenda
        </td>
        <td>
          Marca
        </td>
        <td>
          Tipo Venta
        </td>
        <td>
          Importe
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
        <td>&nbsp;
          
        </td>
      </tr>
    </table>
    </td></tr></table>
    <br />
    <table class="tablaEmpleados" style=" height: 170px; ">
                   <tr style="vertical-align: middle;">
              <td style="text-align: center;">
              <h1> Informe Segun Historial</h1> 
              </td>
            </tr>
          </table>
  </div>
