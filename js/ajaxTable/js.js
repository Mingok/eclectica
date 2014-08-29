// JavaScript Document
var ordenar = '';
$(document).ready(function() {

    // Llamando a la funcion de busqueda al
    // cargar la pagina
    filtrar()

    var dates = $("#del, #al").datepicker({
        yearRange: "-50",
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        onSelect: function(selectedDate) {
            var option = this.id == "del" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(
                            instance.settings.dateFormat ||
                            $.datepicker._defaults.dateFormat,
                            selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date);
        }
    });

    // filtrar al darle click al boton
    $("#btnfiltrar").click(function() {
        filtrar();
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
        } else
        {
            $("#data th span").removeClass("desc").removeClass("asc")
            $(this).addClass("desc");
            ordenar = "&orderby=" + $(this).attr("title") + " desc"
        }
        filtrar()
    });
});

function filtrar()
{
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