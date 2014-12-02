// JavaScript Document
var ordenar = '';
var ordenar_prenda = '';
$(document).ready(function() {

    // Llamando a la funcion de busqueda al
    // cargar la pagina
    if ($("#frm_filtro_ventas").length) {
        filtrarVentas();
    } else {
        filtrar();
    }

    var dates = $("#fecDesde, #fecHasta").datepicker({
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
                      "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],          
        dateFormat: "dd/mm/yy",
        onSelect: function(date){
            if (this.id === "fecDesde") {
                $("#fecHasta").datepicker("option","minDate",
                $("#fecDesde").datepicker("getDate"));
            }
        }
    });

    // filtrar al darle click al boton
    $("#btnfiltrar").click(function() {
        if ($("#frm_filtro_ventas").length) {
            filtrarVentas();
        } else {
            filtrar();
        }
    });

    $("#btnPdfExistencias").click(function() {
        exportarArchivoExistencias('pdf');
    });

    $("#btnXlsExistencias").click(function() {
        exportarArchivoExistencias('xls');
    });

    $("#btnPdfVentas").click(function() {
        exportarArchivoVentas('pdf');
    });

    $("#btnXlsVentas").click(function() {
        exportarArchivoVentas('xls');
    });

    // boton cancelar
    $("#btncancel").click(function() {
        location.reload();
    });

    // ordenar por
    $("#data th span").click(function() {
        var orden = '';
        if ($(this).hasClass("desc"))
        {
            $("#data th span").removeClass("desc").removeClass("asc")
            $(this).addClass("asc");
            ordenar = "&orderby=" + $(this).attr("title") + " asc"
            ordenar_prenda = "&orderby=" + $(this).attr("title") + " asc"
        } else
        {
            $("#data th span").removeClass("desc").removeClass("asc")
            $(this).addClass("desc");
            ordenar = "&orderby=" + $(this).attr("title") + " desc"
            ordenar_prenda = "&orderby=" + $(this).attr("title") + " desc"
        }
        if ($("#frm_filtro_ventas").length) {
            filtrarVentas();
        } else {
            filtrar();
        }
    });
});

function filtrarVentas() {
    $.ajax({
        data: $("#frm_filtro_ventas").serialize() + ordenar,
        type: "POST",
//        dataType: "json",
        url: "ajaxInformeVentas.php?action=listar",
        success: function(data) {
            var html = '';
            if (data.length > 0) {
                html = data;
            }
            if (html.lenght == 0)
                html = '<tr><td colspan="8" align="center">No se encontraron vendas.</td></tr>'
            
            $("#data tbody").html(html);
        }
    });
}

function exportarArchivoExistencias(tipo) {
    var informeUrl = "http://localhost/eclectica/informe/InformePrenda.php?"+$('#frm_filtro').serialize() + '&type=' + tipo;
    window.open(informeUrl);
}

function exportarArchivoVentas(tipo) {
    var informeUrl = "http://localhost/eclectica/informe/InformeVentas.php?"+$('#frm_filtro_ventas').serialize() + '&type=' + tipo;
    window.open(informeUrl);
}

function filtrar() {
    $.ajax({
        data: $("#frm_filtro").serialize() + ordenar,
        type: "POST",
//        dataType: "json",
        url: "ajaxInformePrenda.php?action=listar",
        success: function(data) {
            var html = '';
            if (data.length > 0) {
                html = data;
            }
            if (html.lenght == 0)
                html = '<tr><td colspan="8" align="center">No se encontraron prendas.</td></tr>'
            
            $("#data tbody").html(html);
        }
    });
}