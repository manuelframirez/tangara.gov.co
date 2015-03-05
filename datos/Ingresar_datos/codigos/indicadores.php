<?php

include '../../BaseDatos/conexion.php';
include './codigos/ClassVisual.php';

class indicadores {

    public function NombreIndicador($id_indicador) {
        
    }

    public function NombreMunicipio($id_municipio) {
        
    }

    private function Si_Existe($id_categoria, $id_variable, $id_municipio) {
        $con = App::$base;
        $sql = 'SELECT 
			  `datos`.`id_Datos`
			FROM
			  `datos`
			  where(
			  `datos`.`id_categoria` =? and
			  `datos`.`id_variable`=? and
			  `datos`.`id_municipio`=?)';
        $dat = $con->dosql($sql, array($id_categoria, $id_variable, $id_municipio));
        return(!($dat->EOF));
    }

    private function insertarSQL($Valor, $id_categoria, $id_variable, $id_municipio) {
        $con = new conexion();
        $sql = 'INSERT INTO `datos`(
                `tipo_dato`, `Valor`, `id_categoria`, `id_variable`, `id_municipio`)
                VALUES("1", ' . ($Valor) . ', "' . $id_categoria . '",
		' . $id_variable . ', "' . $id_municipio . '"); ';
        $con->DoSql($sql);
    }

    private function Actualizar($Valor, $id_categoria, $id_variable, $id_municipio) {
        $con = new conexion();
        $sql = 'UPDATE `datos` SET
		  `Valor` = ' . $Valor . '
		WHERE
		  `datos`.`id_categoria` = ' . $id_categoria . ' AND 
		  `datos`.`id_variable` = ' . $id_variable . ' AND 
		  `datos`.`id_municipio` = ' . $id_municipio . ';';
        $con->DoSql($sql);
    }

    public function InsertarDatos($Datos) {
        $Si_actualizo = false;
        foreach ($Datos as $Dato) {
            $Valor = $Dato['Valor'];
            $id_categoria = $Dato['Categoria'];
            $id_variable = $Dato['Variable'];
            $id_municipio = $Dato['Municipio'];
            if ($id_categoria != '-1' && $id_variable != '-1') {
                if ($this->Si_Existe($id_categoria, $id_variable, $id_municipio)) {
                    $this->Actualizar($Valor, $id_categoria, $id_variable, $id_municipio);
                    $Si_actualizo = true;
                } else {
                    $this->insertarSQL($Valor, $id_categoria, $id_variable, $id_municipio);
                }
            }
        }
        if ($Si_actualizo) {
            echo 'Se ha actualizado el indicador.';
        } else {
            echo 'Se ha ingresado la nueva información.';
        }
    }

    public function CategoriasIndicadores($Id_Indicador) 
            {
        $con = App::$base;
        $sql = "SELECT 
                `categoria`.`id_categoria`,
                `categoria`.`Nombre`
              FROM
                `indicadores`
                INNER JOIN `tipo_categoria` 
                ON (`indicadores`.`fk_tipo_categoria` = `tipo_categoria`.`id_tipo_categoria`)
                INNER JOIN `categoria` 
                ON (`tipo_categoria`.`id_tipo_categoria` = `categoria`.`fk_tipo_categoria`)
              WHERE
                `indicadores`.`id_indicadores` = ?
              ORDER BY
                `categoria`.`Nombre`";
        $dat = $con->dosql($sql, array($Id_Indicador));
        $Res = NULL;
        while (!$dat->EOF) {
            $temp = '';
            $temp['id_categoria'] = $dat->fields['id_categoria'];
            $temp['Nombre'] = $dat->fields['Nombre'];
            $Res[] = $temp;
            $dat->MoveNext();
        }
        return $Res;
    }

    private function Maximo($Id_Indicador) {
        $con = App::$base;
        $sql = 'SELECT 
            max(`variables`.`Nivel`) as \'m1\',
            max(`variables1`.`Nivel`) as \'m2\',
            max(`variables2`.`Nivel`) as \'m3\'
          FROM
            `variables`
            left JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
            left JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
           WHERE
          `variables`.`id_indicador` = ? OR 
          `variables1`.`id_indicador` = ? OR 
          `variables2`.`id_indicador` = ? ;';
        $dat = $con->dosql($sql, array($Id_Indicador, $Id_Indicador, $Id_Indicador));
        $Res = NULL;
        while (!$dat->EOF) {
            $temp = '';
            $temp['m1'] = $dat->fields['m1'];
            $temp['m2'] = $dat->fields['m2'];
            $temp['m3'] = $dat->fields['m3'];
            $Res[] = $temp;
            $dat->MoveNext();
        }

        $Res = array($Res[0]['m1'], $Res[0]['m2'], $Res[0]['m3']);
        return(max($Res));
    }

    private function SqlNivel($Nivel, $id_Indicador) {
        $sql = '';
        switch ($Nivel) {
            case '1': $sql = 'SELECT 
                `variables`.`id_variable` AS `id`,
                `variables`.`descripcion`
              FROM
                `variables`
              WHERE
                `variables`.`id_indicador` = ' . $id_Indicador . '
              ORDER BY
                `variables`.`descripcion`';
                break;
            case '2': $sql = 'SELECT 
                    `variables`.`id_variable` AS `id`,
                    CONCAT_WS(\' - \',(`variables1`.`descripcion`),(`variables`.`descripcion`)) AS `Indicador`
                  FROM
                    `variables`
                    INNER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
                  WHERE
                    `variables1`.`id_indicador` = ' . $id_Indicador . '
                  ORDER BY
                    `variables1`.`descripcion`,
                    `variables`.`descripcion`';
                break;
            case '3': $sql = 'SELECT 
                        `variables`.`id_variable` AS `id`,
                        CONCAT_WS(\' - \',(`variables2`.`descripcion`),(`variables1`.`descripcion`),(`variables`.`descripcion`)) AS `Indicador`
                      FROM
                        `variables`
                        INNER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
                        INNER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
                      WHERE
                        `variables2`.`id_indicador` = ' . $id_Indicador . '
                      ORDER BY
                        `variables2`.`descripcion`,
                        `variables1`.`descripcion`,
                        `variables`.`descripcion`';
                break;
        }
        return $sql;
    }

    public function VariablesIndicadores($id_Indicador) {
        $Mayor = $this->Maximo($id_Indicador);
        $con = App::$base;
        $sql = $this->SqlNivel($Mayor, $id_Indicador);
        $dat = $con->dosql($sql, array());
        $Res = NULL;
        while(!$dat->EOF) 
        {
            $temp='';
            $temp[] = $dat->fields;
            $Res[]=$temp;
            $dat->MoveNext();
        }
        return $Res;
    }

    public function OrganizarDatos($values, $Nombre, $titulo = '', $Eje) {
        $Visual = new Visual();
        $ValuesData = array();
        $i = 0;
        $nada = array(-1, 'Vacio');
        $valores = $values;
        array_unshift($valores, $nada);
        if ($titulo != '') {
            $ValuesData[] = $titulo;
        }
        foreach ($values as $temp2) 
        {
            $temp='';
            foreach ($temp2 as $key => $value) 
            {
                $temp3='';
                if(gettype($value[1])=='NULL')
                {
                    foreach ($value as $keys=> $value2) 
                    {
                        $temp3[]=($value2);
                    }
                }
                else
                {
                    $temp3[]=$key;
                    $temp3[]=$value;   
                }
                $temp=$temp3;
            }
            var_dump($valores);
            $Nombres = $Nombre . '[' . $i . ']';
            $id = 'id' . $Nombre . '_' . $i;
            $ValuesData[] = $Visual->Select($valores, $Nombres, $temp[0], $id, 'CambioEstado(' . $i . ',\'' . $Eje . '\')', '', 'scFormObjectOddMult');
            $i++;
        }
        return $ValuesData;
    }

    public function ArrayGuardarDatos($Categorias, $Variables, $Value = '') {
        $Datos = array();
        $TotalCategorias = count($Categorias);
        $TotalVariable = count($Variables);
        for ($i = 0; ($i < 10 && $i < $TotalVariable); $i++) {
            for ($j = 0; $j < $TotalCategorias; $j++) {
                if ($j == 0) {
                    $Datos[$i][$j] = $Variables[$i];
                } else {
                    if ($Value != '') {
                        $Datos[$i][$j] = '<input name="NameValores[' . $i . '][' . ($j - 1) . ']" id="IdValores_' . $i . '_' . ($j - 1) . '" class="values"  value="' . $Value[$i][$j] . '" type="number" step="any"/>' . "\n";
                    } else {
                        $Datos[$i][$j] = '<input name="NameValores[' . $i . '][' . ($j - 1) . ']" id="IdValores_' . $i . '_' . ($j - 1) . '" class="values" type="number" step="any"/>' . "\n";
                    }
                }
            }
        }
        return $Datos;
    }

}
