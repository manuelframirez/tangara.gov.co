$(function()
{
    $.ajax
    ({
        type: "POST",
        url: "Codigo/ajaxrss.php",
        data:{},
        success: function(datos)
        {
            console.log(datos);
            $('#datosrss').html(datos);
        }
    });
});