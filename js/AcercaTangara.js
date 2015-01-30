$(document).ready(function()
{
	$.ajax
    ({
        type: "POST",
        url: "./Codigo/Ajax_Contenido.php",
        data:
        {
            Tipo: 'Tangara'
        },
        success: function(value)
        {
			$('#texto').html(value);
        }
    });
});
