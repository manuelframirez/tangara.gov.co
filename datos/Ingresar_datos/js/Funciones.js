function CambiarEstado(Nombre,eje,pos,Orientacion)
{   
    Nombre='#'+Nombre;
    var estado=$(Nombre).val();
    var Bloquear;
    if(Orientacion=='X')//
    {
        Bloquear ='#IdValores_'+pos+'_'+eje;
    }
    else//variables
    {
        Bloquear ='#IdValores_'+eje+'_'+pos;
    }
    if(estado=='-1')
    {
        $(Bloquear).val('-null');
        $(Bloquear).hide();
        
    }
}
function Guardar()
{
	var valores='';
}
function CambioEstado(Cordenada,Eje)
{
    var filas=$('#id_filas').val();
    var colum=$('#id_colum').val();
    var i,Nombre;
    var Nombres='';
    if(Eje=='X')
    {
        Nombre="idDatos";
        for(i=0;i<filas;i++)
        {
            Nombres=Nombre+"_"+Cordenada;
            CambiarEstado(Nombres,Cordenada,i,Eje);
        }
    }
    else//años
    {
        Nombre="idNombresVariables";
        for(i=0;i<colum;i++)
        {
            Nombres=Nombre+"_"+Cordenada+"";
            CambiarEstado(Nombres,Cordenada,i,Eje);
        }
    }
}
$(function()
{

});