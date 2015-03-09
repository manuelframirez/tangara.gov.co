$(document).ready(function()
{
    $.ajax
    ({
        type: "POST",
        url: "./Codigo/Ajax_Contenido.php",
        data:
        {
            Contenido: 'acerca de tángara'
        },
        success: function(value)
        {
            $('#texto').html(value);
        }
    });
});
