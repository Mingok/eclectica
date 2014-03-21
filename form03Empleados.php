
  <h1 style="text-align: left;">
    &nbsp;Empleados&nbsp;
  </h1>
  <hr />
  <div style="padding-bottom: 10px">
    <table class="tablaEmpleados">
    <tr style="height:180px;">
        <td >
          <table style="width:540px">
          <tr style="vertical-align: middle;">
              <td style="text-align: left;">
                Nombre Tela: &nbsp; <input type="text" name="pbusc"
                value="ingresar" />
              </td>
              <td style="text-align: right; height: 40px;">
                <input type="button" name="pNuevo" value="Agregar"
                class="buttonEmpleados" />
              </td>
              <td style="text-align: right; height: 40px;">
                <input type="button" name="pNuevo" value=
                "Modificar" class="buttonEmpleados" />
              </td>
            </tr>
           
            <tr>
              <td colspan="3" style="text-align: right;">
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
                    <td width="60%">
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                  </tr>
                  <tr style="text-align: center;">
                    <td width="60%">
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                    <td>
                      &nbsp;
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
        <td>
          <table style="width:540px">
                   <tr style="vertical-align: middle;">
              <td style="text-align: center;">
                Datos del empleado Seleccionado
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table class="tablaEmpleados" border="1px">
    <tr>
        <td colspan="7">
          <h1 style="text-align: left;">
            Historial de Ventas <strong><em>Carina</em></strong>
          </h1>
        </td>
      </tr>
      <tr style="vertical-align: middle;">
        <td style="text-align: left;">
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
        
        <td style="text-align: right; height: 40px;">
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
       <td style="text-align: right; height: 40px;">
          Desde: &nbsp; <input type="date" value="<?php echo date('Y-m-d')?>" 
          class="textEmpleados"/>
        </td>
        <td style="text-align: right; height: 40px;">
          Hasta:&nbsp; <input type="date" value="<?php echo date('Y-m-d')?>" 
          class="textEmpleados" />
        </td>
        <td style="text-align: Center; height: 40px;" rowspan="3"  >
          <input type="button" name="pNuevo" value="Buscar" class=
          "buttonEmpleados" />
        </td>
      </tr>
      <tr style="vertical-align: middle;">
         <td style="text-align: right; height: 40px;">
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
 <td style="text-align: right; height: 40px;">
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
        <td style="text-align: right; height: 40px;">
          Min: &nbsp; <input type="text" maxlength="6" name=
          "pNuevo" value="100,00" class="textEmpleados" size=
          "8" />
        </td>
        <td style="text-align: right; height: 40px;">
          Max: &nbsp; <input type="text" maxlength="6" name=
          "pNuevo" value="100,00" class="textEmpleados" size=
          "8"  />
        </td>
        </tr>
      <tr style="vertical-align: middle;">
        <td style="text-align: right; height: 40px;">
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
        <td style="text-align: right; height: 40px;">
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
        <td style="text-align: right; height: 40px;">
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
        <td style="text-align: right; height: 40px;">
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
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
      </tr>
      <tr style="text-align: center;">
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
        <td>
          &nbsp;
        </td>
      </tr>
    </table>
    </td></tr></table>
  </div>
