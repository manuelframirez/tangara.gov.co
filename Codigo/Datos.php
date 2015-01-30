<?php

include_once('ClassVisual.php');
include_once('../BaseDatos/conexion.php');

class Datos {

    public function VerMunicipios($id) {
    $Ver = new Visual();
    $con = new conexion();
	$sql = 'SELECT 
			  `municipio`.`idmunicipio`,
			  `municipio`.`nombreMunicipio`
			FROM
			  `datos`
			  INNER JOIN `municipio` ON (`datos`.`id_municipio` = `municipio`.`idmunicipio`)
			  LEFT OUTER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
			WHERE (`variables`.`id_indicador` = '.$id.' OR  `variables1`.`id_indicador` = '.$id.' OR  `variables2`.`id_indicador` = '.$id.' )
			GROUP BY
			  municipio.idmunicipio
			ORDER BY
			  `municipio`.`nombreMunicipio`';
    
    $Res = $con->TablaDatos($sql);
	if(is_null($Res))
	{
		$Res[0][0]=0;
		$Res[0][1]='Sin datos';
	}
	return $Ver->Select($Res, 'var_id_municipio', '', 'id_municipio', 'CargarGraficador()', '', 'width:100px');
    }

    public function VerDimensiones($id_value='') 
    {
        $Ver = new Visual();
        $con = new conexion();
        $sql = 'SELECT 
            `dimension`.`id_dimension`,
            `dimension`.`Descripcion`
          FROM
            `dimension`';
        $Res = $con->TablaDatos($sql);
        return $Ver->Select($Res, 'var_id_Dimensiones', $id_value, 'id_dimensiones', 'CargarTematicas()', '', 'width:130px');
    }

    public function VerTematicas($id_dimension,$id_value='') {
        $Ver = new Visual();
        $con = new conexion();
        $sql = 'SELECT `id_tematica`, `Descripcion`
              FROM tematica 
                WHERE `tematica`.`fk_Dimension` = "'.$id_dimension.'"
				ORDER BY `tematica`.`Descripcion`';
        $Res = $con->TablaDatos($sql);
        return $Ver->Select($Res, 'var_id_Tematicas', $id_value, 'id_tematica', 'CargarIndicadores()', $id_value='', 'width:130px');
    }

    public function VerIndicadores($id_tematica,$id_value='') {
        $Ver = new Visual();
        $con = new conexion();
        $sql = 'SELECT 
            `indicadores`.`id_indicadores`,
            `indicadores`.`Nombre`
          FROM
            `indicadores`
          WHERE
            `indicadores`.`fk_tematica` = "'.$id_tematica.'"
			ORDER BY `indicadores`.`Nombre`';
        $Res = $con->TablaDatos($sql);
        return $Ver->Select($Res, 'var_id_indicador', $id_value, 'id_indicador', 'CargarNivel()', $id_value='', 'width:130px');
    }

}

?>