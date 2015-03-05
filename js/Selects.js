var ruta = '';
function CargarMunicipiosDatos(id)
{
    $.ajax
    ({
        type: "POST",
        url: "Codigo/ajax_selects.php",
        data:
        {
            Tipo: 'Municipios',
            ID: id
        },
        success: function(datos)
        {
            $('#id_municipios').html(datos);
        }
    });
}
function CargarMunicipios()
{
	var id_indicador=$('#id_indicador').val();
    $.ajax
            ({
                type: "POST",
                url: "Codigo/ajax_selects.php",
                data:
                        {
                            Tipo: 'Municipios',
                            ID: id_indicador
                        },
                success: function(datos)
                {
                    $('#id_municipios').html(datos);
                }
            });
}
function CargarDimensiones()
{
	var id_indicador=$('#id_indicador').val();
    $.ajax
            ({
                type: "POST",
                url: "Codigo/ajax_selects.php",
                data:
                {
					Tipo: 'Dimension',
                    ID: id_indicador
                },
                success: function(datos)
                {
                    $('#id_Dimension').html(datos);
                }
            });
}
function CargarGraficador()
{
    $('#BotonGraficar').show();
}
function Ocultar()
{
    $('#BotonGraficar').hide();
    $('#BotonBuscar').hide();
}
$(function()
{
    Ocultar();
    CargarDimensiones();
    CargarMunicipios();
});
function CargarTematicas()
{
    var id_dimension = $('#id_dimensiones').val();
    $.ajax
            ({
                type: "POST",
                url: "Codigo/ajax_selects.php",
                data:
                        {
                            Tipo: 'Tematica',
                            ID: id_dimension
                        },
                success: function(datos)
                {
                    $('#id_select_tematica').html(datos);
                }
            });
}
function CargarIndicadores()
{
    var id_tematica = $('#id_tematica').val();
    $.ajax
            ({
                type: "POST",
                url: "Codigo/ajax_selects.php",
                data:
                        {
                            Tipo: 'Indicadores',
                            ID: id_tematica
                        },
                success: function(datos)
                {
                    $('#id_select_indicador').html(datos);
                }
            });
}
function CargarNivel()
{
    var indicador = $('#id_indicador').val();
    $.ajax
            ({
                type: "POST",
                url: "Codigo/VerUrl.php",
                data:
                        {
                            id_indicador: indicador
                        },
                success: function(datos)
                {
                    ruta = (datos);
                    console.log(datos);
                    CargarMunicipiosDatos(indicador);
                }
            });
}
function Buscar()
{
    CargarGraficador();
    var municipio = $('#id_municipio').val();
    var indicador = $('#id_indicador').val();
    if (ruta != './error.html')
    {
        urlget = 'index.php?var_id_indicador=' + indicador + '&var_id_municipio=' + municipio + '';
        ruta = ruta + urlget
    }
    $('#Cuadrado').attr('src', ruta);
}
