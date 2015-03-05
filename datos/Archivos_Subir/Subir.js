//Iniciamos nuestra función jquery.
function LaRuta()
{
	var ruta=$("#ruta").val();
	$.ajax
	({
		url:'AjaxRutas.php',
		type:'POST',
		data:
		{
			url:ruta
		}
	}).done(function(msg)
	{
	});
}
$(function()
{
	$('#enviar').click(SubirFotos);
});
function SubirFotos()
{	
		var ruta=$("#ruta").val();
		var archivos = document.getElementById("archivos");
		var archivo = archivos.files;
		var archivos = new FormData();
		for(i=0; i<archivo.length; i++)
		{
			archivos.append('archivo'+i,archivo[i]);
		}
		$.ajax({
			url:'AjaxSubir.php',
			type:'POST',
			data: archivos,
			contentType:false,
			processData:false,
			cache:false
		}).done(function(msg)
		{
			MensajeFinal(msg);
		});
	}

function MensajeFinal(msg){
	$('.mensage').html(msg);//A el div con la clase msg, le insertamos el mensaje en formato  thml
	$('.mensage').show('slow');//Mostramos el div.
}