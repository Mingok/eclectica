<script language="javascript" type="text/javascript">
    function pintafila(fila, color) {
        antes = document.getElementById('tblPrenda').rows[fila].style.backgroundColor;
        for (i = 1; i < document.getElementById('tblPrenda').rows.length; i++) {
            if (document.getElementById('tblPrenda').rows[i].id == fila) {
                document.getElementById('tblPrenda').rows[i].style.backgroundColor = color;
            } else {
                if (!(antes == fila)) {
                    document.getElementById('tblPrenda').rows[i].style.backgroundColor = "transparent";
                }
            }
        }
    }
</script>
<h1>
    Prendas
</h1>
<div  id="exitoPrenda" style="display: none; padding-top: 10px;">

    <div id="CPrenda" class="alert alert-success alert-success1" style=""></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-body  ">
                <div class="col-md-5" style="text-align: right; padding-bottom: 10px;">
                    <label for="txtCodPrenda">
                        Codigo:
                    </label>
                    <input type="search" id="txtCodPrenda" class="textPrendas form-control" placeholder="Ingresar" autofocus style="width: 130px" maxlength="12">
                </div>
                <div class="col-md-5" style="text-align: right;">
                    <label for="txtNomPrenda">
                        Nombre:
                    </label>
                    <input type="search" id="txtNomPrenda" class="textPrendas form-control" placeholder="Digite el texto que desea encontrar y presione la ENTER. Para cancelar la tecla ESCAPE." autofocus style="width: 390px">
                </div>
                <div class="col-md-2">
                    <a href="#prenda">
                        <input type="button" value="Agregar" style="width: 100px;" class="buttonPrendasNueva btn btn-sm btn-success" /></a>
                </div>
                <div class="row">
                    <table class="table">
                        <tr>
                            <td colspan="3" style="text-align: right;">
                                <div class="scrolPrenda">
                                    <table class="table table-condensed" id="tblPrenda">
                                        <thead class="btn-success" style="font-weight: bolder; text-align: center;">
                                        <tr>
                                            <td style="width: 4%">
                                                Mod
                                            </td>
                                            <td style="width: 4%">
                                                Cop
                                            </td>
                                            <td style="width: 10%">
                                                Cod
                                            </td>
                                            <td style="width: 30%">
                                                Nombre
                                            </td>
                                            <td style="width: 4%">
                                                Talle
                                            </td>
                                            <td style="width: 10%">
                                                Color
                                            </td>
                                            <td style="width: 10%">
                                                Estampado
                                            </td>
                                            <td style="width: 14%">
                                                Tela
                                            </td>
                                            <td style="width: 10%">
                                                Temporada
                                            </td>
                                            <td style="width: 4%">
                                                Cantidad
                                            </td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tblPrenda').dataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "views/prenda/ajax_prenda.php"
        } );
    } );

</script>