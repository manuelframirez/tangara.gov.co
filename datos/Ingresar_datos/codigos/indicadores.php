<?php

include '../../BaseDatos/conexion.php';
include './codigos/ClassVisual.php';

class indicadores {
	public function NombreIndicador($id_indicador)
	{
	}
	public function NombreMunicipio($id_municipio)
	{
	}
	private function Si_Existe($id_categoria, $id_variable, $id_municipio)
	{	
	    $con= new conexion();
        $sql = 'SELECT 
			  `datos`.`id_Datos`
			FROM
			  `datos`
			  where(
			  `datos`.`id_categoria` ='.$id_categoria.' and
			  `datos`.`id_variable`='.$id_variable.' and
			  `datos`.`id_municipio`='.$id_municipio.')';
		$Res=$con->DoSql($sql);
		return(!($Res->EOF));
	}
    private function insertarSQL($Valor, $id_categoria, $id_variable, $id_municipio) 
    {
        $con= new conexion();
        $sql = 'INSERT INTO `datos`(
                `tipo_dato`, `Valor`, `id_categoria`, `id_variable`, `id_municipio`)
                VALUES("1", ' . ($Valor) . ', "' . $id_categoria . '",
		'. $id_variable .', "' . $id_municipio . '"); ';
		$con->DoSql($sql);
    }
	private function Actualizar($Valor, $id_categoria, $id_variable, $id_municipio)
	{
		$con= new conexion();
		$sql='UPDATE `datos` SET
		  `Valor` = '.$Valor.'
		WHERE
		  `datos`.`id_categoria` = '.$id_categoria.' AND 
		  `datos`.`id_variable` = '.$id_variable.' AND 
		  `datos`.`id_municipio` = '.$id_municipio.';';
		  $con->DoSql($sql);
	}
    public function InsertarDatos($Datos)
    {
		$Si_actualizo=false;
        foreach($Datos as $Dato)
        {
            $Valor=$Dato['Valor']; 
            $id_categoria=$Dato['Categoria'];
            $id_variable=$Dato['Variable'];
            $id_municipio=$Dato['Municipio'];
			if($id_categoria!='-1'&&$id_variable!='-1')
			{
				if($this->Si_Existe($id_categoria, $id_variable, $id_municipio))
				{
					$this->Actualizar($Valor, $id_categoria, $id_variable, $id_municipio);
					$Si_actualizo=true;
				}
				else
				{
					$this->insertarSQL($Valor, $id_categoria, $id_variable, $id_municipio);
				}
			}		
        }
        if($Si_actualizo)
		{
			echo 'Se ha actualizado el indicador.';
		}
		else
		{
			echo 'Se ha ingresado la nueva información.';
		}
    }
    public function CategoriasIndicadores($Id_Indicador) {
        $con = new conexion();
        $sql = "SELECT 
                `categoria`.`id_categoria`,
                `categoria`.`Nombre`
              FROM
                `indicadores`
                INNER JOIN `tipo_categoria` ON (`indicadores`.`fk_tipo_categoria` = `tipo_categoria`.`id_tipo_categoria`)
                INNER JOIN `categoria` ON (`tipo_categoria`.`id_tipo_categoria` = `categoria`.`fk_tipo_categoria`)
              WHERE
                `indicadores`.`id_indicadores` = $Id_Indicador
              ORDER BY
                `categoria`.`Nombre`";
        return $con->TablaDatos($sql);
    }
    private function Maximo($Id_Indicador)
    {
        $con= new conexion();
        $sql='SELECT 
  max(`variables`.`Nivel`) as \'m1\',
  max(`variables1`.`Nivel`) as \'m2\',
  max(`variables2`.`Nivel`) as \'m3\'
FROM
  `variables`
  left JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
  left JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
 WHERE
`variables`.`id_indicador` = '.$Id_Indicador.' OR 
`variables1`.`id_indicador` = '.$Id_Indicador.' OR 
`variables2`.`id_indicador` = '.$Id_Indicador.';';
        $Res=$con->TablaDatos($sql);
        $Res=array($Res[0]['m1'],$Res[0]['m2'],$Res[0]['m3']);
        
        return(max($Res));
    }
    private function SqlNivel($Nivel,$id_Indicador)
    {
        $sql='';
        switch ($Nivel)
        {
            case '1': $sql='SELECT 
                `variables`.`id_variable` AS `id`,
                `variables`.`descripcion`
              FROM
                `variables`
              WHERE
                `variables`.`id_indicador` = '.$id_Indicador.'
              ORDER BY
                `variables`.`descripcion`';break;
            case '2': $sql='SELECT 
                    `variables`.`id_variable` AS `id`,
                    CONCAT_WS(\' - \',(`variables1`.`descripcion`),(`variables`.`descripcion`)) AS `Indicador`
                  FROM
                    `variables`
                    INNER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
                  WHERE
                    `variables1`.`id_indicador` = '.$id_Indicador.'
                  ORDER BY
                    `variables1`.`descripcion`,
                    `variables`.`descripcion`';break;
            case '3': $sql='SELECT 
                        `variables`.`id_variable` AS `id`,
                        CONCAT_WS(\' - \',(`variables2`.`descripcion`),(`variables1`.`descripcion`),(`variables`.`descripcion`)) AS `Indicador`
                      FROM
                        `variables`
                        INNER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
                        INNER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
                      WHERE
                        `variables2`.`id_indicador` = '.$id_Indicador.'
                      ORDER BY
                        `variables2`.`descripcion`,
                        `variables1`.`descripcion`,
                        `variables`.`descripcion`';break;
        }
        return $sql;
    }
    public function VariablesIndicadores($id_Indicador) 
    {
        $Mayor=$this->Maximo($id_Indicador);
        
        $con = new conexion();
        $sql = $this->SqlNivel($Mayor, $id_Indicador);
        return $con->TablaDatos($sql);
    }

    public function OrganizarDatos($values,$Nombre,$titulo='',$Eje) 
    {
        $Visual= new Visual();
        $ValuesData=array();
        $i=0;
        $nada=array(-1,'Vacio');
        $valores=$values;
        array_unshift($valores,$nada);
        if($titulo!='')
        {
            $ValuesData[]=$titulo;
        }
        foreach($values as $temp)
        {   
            $Nombres=$Nombre.'['.$i.']';
            $id='id'.$Nombre.'_'.$i;
            $ValuesData[]= $Visual->Select($valores, $Nombres, $temp[0],$id,'CambioEstado('.$i.',\''.$Eje.'\')','','scFormObjectOddMult');
            $i++;
        }
        return $ValuesData;
        
    }

    public function ArrayGuardarDatos($Categorias, $Variables,$Value='')
    {   
        $Datos = array();
        $TotalCategorias = count($Categorias);
        $TotalVariable = count($Variables);
        for ($i = 0; ($i <  10 && $i<$TotalVariable); $i++) 
        {
            for ($j = 0; $j <$TotalCategorias ;$j++) 
            {
                if ($j == 0) 
                {
                    $Datos[$i][$j] = $Variables[$i];
                } 
                else 
                {
                    if($Value!='')
                    {
                        $Datos[$i][$j] = '<input name="NameValores['.$i.']['.($j-1).']" id="IdValores_'.$i.'_'.($j-1).'" class="values"  value="'.$Value[$i][$j].'" type="number" step="any"/>'."\n";
                    }
                    else
                    {
                        $Datos[$i][$j] = '<input name="NameValores['.$i.']['.($j-1).']" id="IdValores_'.$i.'_'.($j-1).'" class="values" type="number" step="any"/>'."\n";
                    }
                }
            }
        }
        return $Datos;
    }

}
