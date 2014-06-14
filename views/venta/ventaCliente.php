<?php
require_once 'classes/persona/persona.php';
$personaList = new persona();
$personas = $personaList->personasDisponibles();
require_once 'classes/tipoVenta/tipoVenta.php';
$tipoVentaList = new tipoVenta ();
$tipoVentas = $tipoVentaList->tipoVentasDisponibles();
require_once 'classes/prenda/prenda.php';
$prendaList = new prenda ();
$prendas = $prendaList->prendasDisponibles();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Clinete
                </h3>
            </div>
            <div class="panel-body" style="text-align: right">
                <label style="text-align:left">
                    Cliente:
                </label>
                <select id="selecCliente" name="selecCliente" style="width:240px;" autofocus="true"  required>
                    <option></option>
                    <?php
                    foreach ($personas as $persona) {
                        if (isset($persona)) {
                            echo "<option value=" . $persona["idPersona"] . ">" . $persona["apellidoPersona"] . " " . $persona["nombrePersona"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div style="height: 10px"></div>
                <label style="text-align:left">Condicion : </label>
                <select id="selecCondicionGral" name="selecCondicionGral" style="width: 240px" required>
                    <option></option>
                    <option value="1">
                        Grupo 1
                    </option>
                    <option value="2">
                        Grupo 2
                    </option>
                    <option value="3">
                        Grupo 3
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="precio1" name="precio1"  />
<input type="hidden" id="precio2" name="precio2"  />
<input type="hidden" id="precio3" name="precio3"  />
<input type="hidden" id="precio4" name="precio4"  />
<input type="hidden" id="precio5" name="precio5"  />
<input type="hidden" id="precio6" name="precio6"  />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Prenda
                </h3>
            </div>            
            <form action="JavaScript:agregarCampo();" method="post">
                <input type="hidden" id="idItemVenta" name="idItemVenta" />
                <input type="hidden" id="condItemVenta" name="condItemVenta" />
                <input type="hidden" id="ItemVenta" name="ItemVenta" />
                <input type="hidden" id="detalleItemVenta" name="detalleItemVenta" />
                <input type="hidden" id="precioItemVenta" name="precioItemVenta"  />
                <div class="row">
                    <div class="col-md-12" >
                        <div style="height: 10px"></div>
                        &nbsp;&nbsp;&nbsp;&nbsp;<label for="codItemVenta">
                            Codigo:
                        </label>
                        <input type="text" id="codItemVenta" class="codItemVenta form-control" placeholder="Ingresar" style="width: 140px" maxlength="12" autofocus>
                        &nbsp;&nbsp;&nbsp;&nbsp;<label for="cantidadPrenda">
                            Cantidad :
                        </label>
                        <input type="number" title="Indresar Cantidad" name="cantidadItemVenta" id="cantidadItemVenta" style="width: 60px;" class="form-control" min="1" max="20" value="1" />

                    </div>
                </div>
                <div style="height: 10px"></div>
                <div class="row">
                    <div class="col-md-12" style="text-align: right;    ">
                        <label for="selecCondicionItem">
                            Condicion :
                        </label>
                        <select id="selecCondicionItem" name="selecCondicionItem" style="width: 270px" required >
                            
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                        <img id="imgCondicionItem" style="display: none;" src="./imagenes/iconos/loading.gif" alt="Cargando" />
                    </div>
                </div>
                <div style="height: 10px"></div>
                <div class="row" style="text-align: right">
                    <div class="col-md-12" >
                       &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="Agregar Item" id="agregarItem" style="width: 150px;" class="btn btn-sm btn-success" />
                       &nbsp;&nbsp;&nbsp;&nbsp;<a id="fancyboxPrenda" class="fancyboxPrenda" href="#informacion">
                            <input type="button"
                                   value="Buscar" style="width: 100px;"
                                   class="btn btn-sm btn-primary" /></a>&nbsp;&nbsp;&nbsp;&nbsp;                        
                    </div>
                </div>
                <div style="height: 10px"></div>
            </form>    
        </div>
    </div>
</div>
<script type="text/javascript">

$('#selecCondicionItem').on("change", function(e) {
   alert( this.value ); 
    $("#condItemVenta").val(this.options[e.val].text);
   switch (this.value){
        case '1':$('input[name=precioItemVenta]').val($('#precio1').val()); break;
        case '2':$('input[name=precioItemVenta]').val($('#precio2').val()); break;
        case '3':$('input[name=precioItemVenta]').val($('#precio3').val()); break;
        case '4':$('input[name=precioItemVenta]').val($('#precio4').val()); break;
        case '5':$('input[name=precioItemVenta]').val($('#precio5').val()); break;
        case '6':$('input[name=precioItemVenta]').val($('#precio6').val()); break;
    }
});
</script>
