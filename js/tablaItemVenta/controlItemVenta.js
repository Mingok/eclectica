var campos = 0;
var camposTotal=0;
var importe = new Array();
var importeTotal = 0;

function agregarCampo() {
    importeTotal = 0;
    campos = campos + 1;
    camposTotal =camposTotal+ 1;
    NvoCampo =
            "   <tr id= 'divcampo_" + (campos) + "'>" +
            "     <td style=' text-align: center;'>" + $("#codItemVenta").val() +
            "        <input type='hidden' value='" + $("#codItemVenta").val() + "' name='venta[" + campos + "][codItemVenta]' id='articu_" + campos + "'>" +
            "     </td>" +
            "     <td style=' text-align: left;'>" + $("#detalleItemVenta").val() +
            "        <input type='hidden' value='" + $("#detalleItemVenta").val() + "' name='venta[" + campos + "][detalleItemVenta]' id='articu_" + campos + "'>" +
            "     </td>" +
            "     <td style=' text-align: left;'>" + $("#condItemVenta").val() +
            "        <input type='hidden' value='" + $("#condItemVenta").val() + "'  name='venta[" + campos + "][condItemVenta]' id='articu_" + campos + "'>" +
            "     </td>" +
            "     <td style=' text-align: center;'>" + $("#precioItemVenta").val() +
            "        <input type='hidden' value='" + $("#precioItemVenta").val() + "' name='venta[" + campos + "][precioItemVenta]' id='articu_" + campos + "'>" +
            "     </td>" +
            "     <td style=' text-align: center;'>" + $("#cantidadItemVenta").val() +
            "        <input type='hidden' value='" + $("#cantidadItemVenta").val() + "' name='venta[" + campos + "][cantidadItemVenta] ' id='articu_" + campos + "'>" +
            "     </td>" +
            "     <td style=' text-align: center;'>" + $("#cantidadItemVenta").val() * $("#precioItemVenta").val() +
            "        <input type='hidden' value='" + $("#cantidadItemVenta").val() * $("#precioItemVenta").val() + "' name='venta[" + campos + "][totalItemVenta] ' id='articu_" + campos + "'>" +
            "     </td>" +
            "     <td style=' text-align: center;'>" +
            "        <a href='JavaScript:quitarCampo(" + campos + ");'> <img src='./imagenes/iconos/delete.png' /></a>" +
            "     </td>" +
            "   </tr>";

    importe[campos] = parseFloat($("#cantidadItemVenta").val()) * parseFloat($("#precioItemVenta").val());
    for (var i = 1; i < importe.length; i = i + 1) {
        importeTotal += parseFloat(importe[i]);
    }
    
    $("#contenedorcampos").append(NvoCampo);
    $("#span_cantidad").html(camposTotal);
    $("#span_Total").html(importeTotal);
    $('#codItemVenta').val('0');
    $('#cantidadItemVenta').val('1');
    $('#selecCondicionItem').val(["0"]).select2();
    $('#agregarItem').hide();
    $('#areaItemAVender').hide('slow');


}

function quitarCampo(iddiv) {
    importeTotal = 0;
    camposTotal =camposTotal- 1;
    var eliminar = document.getElementById("divcampo_" + iddiv);
    importe[iddiv] = 0;
    for (var i = 1; i < importe.length; i = i + 1) {
        importeTotal += parseFloat(importe[i]);

    }

    var contenedor = document.getElementById("contenedorcampos");
    contenedor.removeChild(eliminar);
    $("#span_Total").html(importeTotal);
$("#span_cantidad").html(camposTotal);

}
