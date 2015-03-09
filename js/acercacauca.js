$(document).ready(function ()
{
    $.ajax
    ({
        type: "POST",
        url: "./Codigo/Ajax_Contenido.php",
        data:
        {
            Contenido: 'acerca del cauca'
        },
        success: function (value)
        {
            $('#texto').html(value);
        }
    });
});
