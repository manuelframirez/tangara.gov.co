var Nombreid='';
var Nombre_Municipio='';
var Year;
function year(id_indicador,id_municipio)
{
    $.ajax
    ({
        type: "POST",
        url: "./Codigo/Ajax_Years_Municipios.php",
        data:
        {
            id: id_indicador,
            id_municipio: id_municipio
        },
        success: function(datos)
        {
            Year=JSON.parse(datos);//["2005", "2006", "2007", "2008", "2009", "2010", "2011", "2012" ];//datos;
            
        }
    });
}
function NombreIndicador(id_indicador,id_municipio)
{
    $.ajax
    ({
        type: "POST",
        url: "./Codigo/ajax_Nombre_indicador.php",
        data:
        {
            id: id_indicador,
            id_municipio: id_municipio
        },
        success: function(Nombre)
        {
            $Valores=Nombre.split(";");
            Nombreid = $Valores[0];
            Nombre_Municipio = $Valores[1];
        }
    });
}
function GraficarlosDatos()
{
    var id_indicador = $('#id_select_indicador').val();
    var id_municipio = $('#id_municipios').val();
    NombreIndicador(id_indicador,id_municipio);
    Year=year(id_indicador,id_municipio);
    $.ajax
            ({
                type: "POST",
                url: "./Codigo/ajax_Graficar.php",
                data:
                {
                    id_indicador: id_indicador,
                    id_municipio: id_municipio
                },
                success: function(LosDatos)
                {
                    var Datos = eval("(" + LosDatos + ")");
                    var ElContenedor = 'container_graficos';
                    var ElTexto = Nombre_Municipio;
                    var Lossubtitulos ='' ;
                    var ElTextoGrafico = Nombreid;
                    var ElTextoEje = '.';//' Litros Leche Mes';
                    var LosTipoGrafico = $('#TipoGrafica').val(); 
                    var ElTextoPuntos = '.';
                    var LasCategorias = Year;
                    GraficarDatos(ElContenedor, ElTexto, Lossubtitulos, ElTextoGrafico, ElTextoEje, ElTextoPuntos, LosTipoGrafico, LasCategorias, Datos);
                }
            });
}
function VerGrafica()
{
    var id_indicador = $('#id_indicador').val();
    var id_municipio = $('#id_municipio').val();
    var url = './Graficas.php?id_indicador=' + id_indicador + '&id_municipio=' + id_municipio;
    window.open(url);
}