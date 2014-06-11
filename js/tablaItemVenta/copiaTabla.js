
function fn_cantidad(){
	cantidad = $("#grilla tbody").find("tr").length;
	$("#span_cantidad").html(cantidad);
};
function fn_agregar(){

    cadena = "<tr>";
    cadena = cadena + "<td>" + $("#codItemVenta").val() + "</td>";
    cadena = cadena + "<td>" + $("#detalleItemVenta").val() + "</td>";
    cadena = cadena + "<td>" + $("#condItemVenta").val() + "</td>";
    cadena = cadena + "<td>" + $("#precioItemVenta").val() + "</td>";
    cadena = cadena + "<td>" + $("#cantidadItemVenta").val() + "</td>";
    cadena = cadena + "<td>" + $("#cantidadItemVenta").val()*$("#precioItemVenta").val() + "</td>";
    cadena = cadena + "<td><a class='elimina'><img src='./imagenes/iconos/delete.png' /></a></td>";
    $("#grilla tbody").append(cadena);
    fn_dar_eliminar();
	fn_cantidad();
    alert("Usuario agregado");
    $('#agregarItem').hide();
    document.forms['frm_usu'].reset();
};
function fn_dar_eliminar(){
    $("a.elimina").click(function(){
        id = $(this).parents("tr").find("td").eq(0).html();
        respuesta = confirm("Desea eliminar el usuario: " + id);
        if (respuesta){
            $(this).parents("tr").fadeOut("normal", function(){
                $(this).remove();
                alert("Usuario " + id + " eliminado")
                /*
                    aqui puedes enviar un conjunto de datos por ajax
                    $.post("eliminar.php", {ide_usu: id})
                */
            })
        }
    });
};