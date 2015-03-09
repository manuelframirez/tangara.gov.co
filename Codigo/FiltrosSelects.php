<?php
include_once'../BaseDatos/conexion.php';
class FiltrosSelects 
{
    function Indicadores($id) 
    {
        $sql = 'SELECT  
            `tematica`.`id_tematica`, 
            `dimension`.`id_dimension`, 
            `indicadores`.`id_indicadores`
                          FROM `indicadores`
                            INNER JOIN `tematica` ON (`indicadores`.`fk_tematica` = `tematica`.`id_tematica`)
                            INNER JOIN `dimension` ON (`tematica`.`fk_Dimension` = `dimension`.`id_dimension`)
                          WHERE `indicadores`.`id_indicadores` = ?';
        $con = App::$base;
        $Res = NULL;
        $dat = $con->dosql($sql, array($id));
        while (!$dat->EOF)
        {
            $temp = '';
            $temp['id_tematica'] = $dat->fields['id_tematica'];
            $temp['id_dimension'] = $dat->fields['id_dimension'];
            $temp['id_indicadores'] = $dat->fields['id_indicadores'];
            $Res[] = $temp;
            $dat->MoveNext();
        }
        return $Res[0];
    }
    function Tematica($id)
    {
        $sql = 'SELECT 
            `tematica`.`id_tematica`, 
            `dimension`.`id_dimension`
                          FROM `indicadores`
                          INNER JOIN `tematica` ON (`indicadores`.`fk_tematica` = `tematica`.`id_tematica`)
                          INNER JOIN `dimension` ON (`tematica`.`fk_Dimension` = `dimension`.`id_dimension`)
                          WHERE `indicadores`.`id_indicadores` = ?';
        $con = App::$base;
        $Res = NULL;
        $dat = $con->dosql($sql, array($id));
        while (!$dat->EOF)
        {
            $Res['id_tematica'] = $dat->fields['id_tematica'];
            $Res['id_dimension'] = $dat->fields['id_dimension'];
            $dat->MoveNext();
        }
        return $Res;
    }
    function id_Tipo($id)
    {
        $sql = 'SELECT 
                        `dimension`.`id_dimension`
                        FROM `indicadores`
                        INNER JOIN `tematica` ON (`indicadores`.`fk_tematica` = `tematica`.`id_tematica`)
                        INNER JOIN `dimension` ON (`tematica`.`fk_Dimension` = `dimension`.`id_dimension`)
                        WHERE `indicadores`.`id_indicadores` = ?';

        $con = App::$base;
        $Res = NULL;
        $dat = $con->dosql($sql, array($id));
        while (!$dat->EOF) {
            $temp = '';
            $temp[] = $dat->fields['id_dimension'];
            $Res[] = $temp;
            $dat->MoveNext();
        }
        return $Res[0][0];
    }

}
