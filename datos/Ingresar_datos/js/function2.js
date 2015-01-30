var Data;
var $container = $("#example1");
var array_filas = new Array();
var array_colum = new Array('variable/categoría');
var Formatcolum;
function FormatearColumnas(cant)
{
	var data=[{data: "info", readOnly: true}];
	var newData={type: 'numeric',format: '0,00.00'};
	var colum = $("#id_colum").val()-1;
	for(i=0;i<cant;i++)
	{data.push(newData);}
	return data;
}
function escribir(fila,columna,valor)
{
	columna=columna-1;
	console.log(fila,columna,valor);
	var Nombre='#IdValores_'+fila+'_'+columna;
	$(Nombre).val(valor);
}
function guardar()
{
	var i,j,temp;
	var array=Data.getData();
	for(i=0;i<array.length;i++)
	{
	
		temp=array[i];
		$.each(temp, function( index, value ) 
		{
			if(index!=='info')
			{
				escribir( i,index,value );				
			}
		});
	}
}
function limpiar()
{
	array_filas = new Array();
	array_colum = new Array('variable/categoría');
	Formatcolum=null;

}
function CargarValores()
{
	var visibles=0;
	var filas = $("#id_filas").val();
	var colum = $("#id_colum").val()-1;
	var nombretemp='';
	var temp;
	for(i=0;i<colum;i++)
	{
		nombretemp='#idDatos_'+(i);
		if($(nombretemp).val()!="-1")
		{
			visibles++;
			array_colum.push($(nombretemp+" option:selected").text());
		}
	}
	for(i=0;i<filas;i++)
	{
		nombretemp='#idNombresVariables_'+(i);
		if($(nombretemp).val()!="-1")
		{
			temp={info:($(nombretemp+" option:selected").text())};
			array_filas.push(temp);
		}
	}
	Formatcolum=FormatearColumnas(visibles);
}
function CrearGrid()
{
	$("#example1").handsontable(
	{
		//contextMenu: null,
		data:array_filas,
		colHeaders: array_colum,
		columns: Formatcolum,
    });
	Data = $("#example1").data('handsontable');
}
function SiValido()
{
	var SiesValido = true;
	var i,j,temp;
	var array=Data.getData();
	for(i=0;i<array.length;i++)
	{
	
		temp=array[i];
		$.each(temp, function( index, value ) 
		{
			if(index!=='info')
			{
				if(!$.isNumeric(value))
				{
					SiesValido = false;
				}
			}
		});
	}
	return SiesValido;
}
function dialogo()
{
	$( "#loading" ).dialog
	({
		autoOpen: false,
		width: "100%",
		position: ['center', 'top'],
		//modal: true,
		position: top,
		buttons: 
		{
			"Guardar": function() 
			{
				if(SiValido())
				{
					guardar();
					$( this ).dialog( "close" );
				}
				else
				{
					alert('Algunos valores no son numericos');
				}
			},
			"Salir": function() 
			{
				$( this ).dialog( "close" );
			}
		}
	
	});
}
function PegarExcel()
{
	limpiar();
	CargarValores();
	CrearGrid();
	dialogo();
	$( "#loading" ).dialog( "open" );
}

$(function()
{
	dialogo();
});