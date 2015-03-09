var Contenedor;
var Texto;
var subtitulos;
var TipoGrafico;
var TextoGrafico;
var TextoEje;
var TextoPuntos;
var Categorias = new Array();
function AcomodarDatos(Datos)
{

    var temp, count;
    for (var i = 0; i < Datos.length; i++)
    {
        var data = Datos[i]['data'];
        $.each(data, function(index, value)
        {
            Datos[i]['data'][index] = parseInt(value);
        });
    }
    return Datos;
}
function Graficos(Datos)
{
    $(document).ready(function()
    {
	Highcharts.setOptions
        ({
            lang: 
            {
                numericSymbols: null //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
            }
        });
        chart = new Highcharts.Chart
        ({
            chart:
            {
                renderTo: Contenedor,
                type: TipoGrafico,
                marginBottom: 20              
            },
            title:
            {
                text: Texto, x: -20
            },
            credits: {
                enabled: false
            },
            subtitle:
            {
                text: subtitulos, x: -20
            },
            xAxis:
            {
                categories: Categorias
            },
            yAxis:
            {
                title:
                {
                    text: TextoGrafico
                },
                plotLines:
                [{
                    value: 100,
                    width: 1,
                    color: '#80808F'
                }]
            },
            plotOptions: 
            {
                series: 
                {
                    borderWidth: 0,
                    pointWidth: 10,
                    lineWidth: 3
                }
            },
            tooltip:
            {
                 formatter: function()
                {
                    return'<b>' + this.series.name + '</b><br/>' + this.x + ': ' + this.y + ' ' + TextoPuntos;
                }
            },
            legend:
            {
                title: 
                {
                    text: 'Variables'
                },
                id: "null",
                align: 'left',
                verticalAlign: 'middle',
                layout: 'vertical'
            },
            series: Datos,
            exporting: 
            {
                sourceWidth: 1600,
                sourceHeight: 8,
                chartOptions: 
                {
                    subtitle: null
                }
            }
        });
    });
}
function GraficarDatos(ElContenedor, ElTexto, Lossubtitulos, ElTextoGrafico, ElTextoEje, ElTextoPuntos, LosTipoGrafico, LasCategorias, Datos)
{
    Contenedor = ElContenedor;
    Texto = ElTexto;
    subtitulos = Lossubtitulos;
    TextoGrafico = ElTextoGrafico;
    TextoEje = ElTextoEje;
    TextoPuntos = ElTextoPuntos;
    TipoGrafico = LosTipoGrafico;
    Categorias = LasCategorias;
    Datos = AcomodarDatos(Datos);
    Graficos(Datos);
}