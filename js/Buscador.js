$(document).ready(function(){
	
});
function cargar()
{
	var Dimension = $("#id_Dimension").val();
	var tematica = $("#id_tematica").val();
	var Indicador = $("#Indicador").val();
	var municipios = $("#municipios").val();
	var url='';
	switch(Dimension)
	{
		case '1':url='sis_6/grid_tabla_dinamica_nivel1/';break;
		case '2':url='sis_6/grid_tabla_dinamica2/';break;
		case '3':url='sis_6/grid_tabla_dinamica3/';break;
		default: url='';break;
	}
	$("#urliframe").attr("src", url);
}