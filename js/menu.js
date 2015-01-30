function Dimension(id)
{
    $.ajax
    ({
        type: "POST",
        url: "Codigo/Ajax_Buscar_Select.php",
        data:
        {
            Tipo: 'Dimension',
            ID: id
        },
        success: function(datos)
        {
            $('#id_Dimension').html(datos);
        }
    });
}
function Indicadores(id)
{
    $.ajax
    ({
        type: "POST",
        url: "Codigo/Ajax_Buscar_Select.php",
        data:
        {
            Tipo: 'Indicadores',
            ID: id
        },
        success: function(datos)
        {
            $('#id_select_indicador').html(datos);
            CargarNivel();
        }
    });
}
function Tematica(id)
{
    $.ajax
    ({
        type: "POST",
        url: "Codigo/Ajax_Buscar_Select.php",
        data:
        {
            Tipo: 'Tematica',
            ID: id
        },
        success: function(datos)
        {
            $('#id_select_tematica ').html(datos);
        }
    });
}
function Filtrar(id)
{
    console.log(id);
    Dimension(id);
    Tematica(id);
    Indicadores(id);
}