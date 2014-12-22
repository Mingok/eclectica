// JavaScript Document
var ordenar = '';
var ordenar_prenda = '';
$(document).ready(function () {
    // Llamando a la funcion de busqueda al
    // cargar la pagina
    if ($("#frm_filtro_gastos").length) {
        filtrarGastos();
    }
    if ($("#frm_filtro_ventas").length) {
        filtrarVentas();
    }
    if ($("#frm_filtro_Prendas").length) {
        filtrarPrendas();
    }

    var dates = $("#fecDesde, #fecHasta").datepicker({
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
            "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
        dateFormat: "dd/mm/yy",
        onSelect: function (date) {
            if (this.id === "fecDesde") {
                $("#fecHasta").datepicker("option", "minDate",
                        $("#fecDesde").datepicker("getDate"));
            }
        }
    });

    // filtrar al darle click al boton
    $("#btnFiltrar").click(function () {
        if ($("#frm_filtro_gastos").length) {
            filtrarGastos();
        }
        if ($("#frm_filtro_ventas").length) {
            filtrarVentas();
        }
        if ($("#frm_filtro_Prendas").length) {
            filtrarPrendas();
        }
    });
    //llamada A exportar listados Pdf y excel
    $("#btnPdfGastos").click(function () {
        exportarArchivoGastos('pdf');
    });
    $("#btnPdfVentas").click(function () {
        exportarArchivoVentas('pdf');
    });
    $("#btnPdfExistencias").click(function () {
        exportarArchivoExistencias('pdf');
    });

    $("#btnXlsGastos").click(function () {
        exportarArchivoGastos('xls');
    });
    $("#btnXlsVentas").click(function () {
        exportarArchivoVentas('xls');
    });
    $("#btnXlsExistencias").click(function () {
        exportarArchivoExistencias('xls');
    });
    // boton cancelar
    $("#btnCancel").click(function () {
        location.reload();
    });

    // ordenar por On Click en las th de la tabla
    $("#data th span").click(function () {
        
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
        if ($("#frm_filtro_gastos").length) {
            filtrarGastos();
        }
        if ($("#frm_filtro_ventas").length) {
            filtrarVentas();
        }
        if ($("#frm_filtro_Prendas").length) {
            filtrarPrendas();
        }
    });
});

function filtrarGastos() {
    $.ajax({
        data: $("#frm_filtro_gastos").serialize() + ordenar,
        type: "POST",
//        dataType: "json",
        url: "ajaxInformeGastos.php?action=listar",
        success: function (data) {
            var html = '';
            if (data.length > 0) {
                html = data;
            }
            $("#data tbody").html(html);
        }
    });
}
function filtrarVentas() {
    $.ajax({
        data: $("#frm_filtro_ventas").serialize() + ordenar,
        type: "POST",
//        dataType: "json",
        url: "ajaxInformeVentas.php?action=listar",
        success: function (data) {
            var html = '';
            if (data.length > 0) {

                html = data;
            }
            $("#data tbody").html(html);
        }
    });
}
function filtrarPrendas() {
    $.ajax({
        data: $("#frm_filtro_Prendas").serialize() + ordenar,
        type: "POST",
//        dataType: "json",
        url: "ajaxInformePrenda.php?action=listar",
        success: function (data) {
            var html = '';
            if (data.length > 0) {
                html = data;
            }
            $("#data tbody").html(html);
        }
    });
}
function exportarArchivoGastos(tipo) {
    var informeUrl = "http://localhost/eclectica/informe/InformeGastos.php?" + $('#frm_filtro_gastos').serialize() + '&type=' + tipo;
    window.open(informeUrl);
}
function exportarArchivoVentas(tipo) {
    var informeUrl = "http://localhost/eclectica/informe/InformeVentas.php?" + $('#frm_filtro_ventas').serialize() + '&type=' + tipo;
    window.open(informeUrl);
}
function exportarArchivoExistencias(tipo) {
    var informeUrl = "http://localhost/eclectica/informe/InformePrenda.php?" + $('#frm_filtro_Prendas').serialize() + '&type=' + tipo;
    window.open(informeUrl);
}

