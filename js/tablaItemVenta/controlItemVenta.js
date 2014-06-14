var campos = 0;

function agregarCampo(){
  
	campos = campos + 1;
	NvoCampo= 
		"   <tr id= 'divcampo_"+(campos)+"'>" +
		"     <td style=' text-align: center;'>" +$("#codItemVenta").val() + 
		"        <input type='hidden' value='"+$("#codItemVenta").val() + "' name='venta[" + campos + "][codItemVenta]' id='articu_" + campos + "'>" +
		"     </td>" +
        "     <td style=' text-align: left;'>" + $("#detalleItemVenta").val() + 
		"        <input type='hidden' value='"+ $("#detalleItemVenta").val() + "' name='venta[" + campos + "][detalleItemVenta]' id='articu_" + campos + "'>" +
		"     </td>" +
		"     <td style=' text-align: left;'>" + $("#condItemVenta").val() + 
		"        <input type='hidden' value='"+ $("#condItemVenta").val() + "'  name='venta[" + campos + "][condItemVenta]' id='articu_" + campos + "'>" +
		"     </td>" +
        "     <td style=' text-align: center;'>" +$("#precioItemVenta").val() +
		"        <input type='hidden' value='"+ $("#precioItemVenta").val() + "' name='venta[" + campos + "][precioItemVenta]' id='articu_" + campos + "'>" +
		"     </td>" +
		"     <td style=' text-align: center;'>" +$("#cantidadItemVenta").val() +
		"        <input type='hidden' value='"+ $("#cantidadItemVenta").val() + "' name='venta[" + campos + "][cantidadItemVenta] ' id='articu_" + campos + "'>" +
		"     </td>" +
        "     <td style=' text-align: center;'>" +$("#cantidadItemVenta").val()*$("#precioItemVenta").val() +
		"        <input type='hidden' value='"+$("#cantidadItemVenta").val()*$("#precioItemVenta").val() + "' name='venta[" + campos + "][totalItemVenta] ' id='articu_" + campos + "'>" +
		"     </td>" +
		"     <td style=' text-align: center;'>" +
		"        <a href='JavaScript:quitarCampo(" + campos +");'> <img src='./imagenes/iconos/delete.png' /></a>" +
		"     </td>" +
        "   </tr>";
    $("#contenedorcampos").append(NvoCampo);$("#span_cantidad").val(campos);
  }

function quitarCampo(iddiv){
  var eliminar = document.getElementById("divcampo_" + iddiv);
  var contenedor= document.getElementById("contenedorcampos");
  contenedor.removeChild(eliminar);
}

