<?php

include_once('../BaseDatos/conexion.php');

class graficar {

    private $municipio;
    private $indicador;

    public function Municipio_Set($id_municipio) {
        $this->municipio = $id_municipio;
    }

    public function Indicador_Set($id_indicador) {
        $this->indicador = $id_indicador;
    }

    private function Valores() {
        $sql = '';
        $con = new conexion();
        $Res = $con->TablaDatos();
        return $Res;
    }

        public function ValoresCategorias() {
            $Paramentros=array($this->municipio,$this->indicador);
            $sql = 'SELECT 
        `categoria`.`Nombre`
        FROM
        `datos`
        LEFT OUTER JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
        LEFT OUTER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
        LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
        LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
        WHERE
        `datos`.`id_municipio` =  ? AND `variables`.`id_indicador` = ?
        GROUP BY  categoria.Nombre
        ORDER BY `categoria`.`Nombre`';
        $Res = $this->TablaDatos($sql,$Paramentros);
        if ($Res === NULL) {
            $sql = 'SELECT 
                        `categoria`.`Nombre`
                      FROM
                        `datos`
                        LEFT OUTER JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
                        LEFT OUTER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
                        LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
                        LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
                      WHERE
			  `datos`.`id_municipio` = ? AND `variables1`.`id_indicador` = ?
			GROUP BY `categoria`.`Nombre` ORDER BY `categoria`.`Nombre`';

            $Res = $this->TablaDatos($sql,$Paramentros);
        }
        return $Res;
    }    
    

    private function FormatearCategorias($Datos) {
        $Total = array();
        for ($i = 0; $i < count($Datos); $i++) 
        {
            $Total[] = $Datos[$i]['Valor'];
        }
        return $Total;
    }
    private function TablaDatos($sql, $parametros =  array())
    {
        $con = App::$base;
        $dat = $con->dosql($sql, $parametros);
        $Res = NULL;
        while (!$dat->EOF)
        {
            $Res[] = $dat->fields;
            $dat->MoveNext();
        }
        return $Res;
    }
    private function LlamarValoresxCategoria($Categoria) 
    {
        $Parametros=array($this->indicador,$this->municipio,$Categoria);
        $sql = 'SELECT 
                    IFNULL(`datos`.`Valor`,0) as "Valor"
                FROM
		`datos`
		left JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
		left JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
		LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
		LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
		WHERE
		`variables`.`id_indicador` = ? AND 
		`datos`.`id_municipio` = ? AND 
		`variables`.`id_variable` = ?
                GROUP BY  `categoria`.`Nombre`';
        $Res = $this->TablaDatos($sql,$Parametros);
        if ($Res === NULL) 
        {
            $sql = 'SELECT 
			  IFNULL(`datos`.`Valor`,0) as "Valor"
			FROM
			  `datos`
			  left JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
			  left JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
				  WHERE
				  `variables1`.`id_indicador` = ? AND 
				  `datos`.`id_municipio` = ? AND 
				   `variables`.`id_variable` = ?
                        GROUP BY  `categoria`.`Nombre`';
            $Res = $this->TablaDatos($sql,$Parametros);
        }
        $Res = $this->FormatearCategorias($Res);
        return $Res;
    }

    private function Categorias() 
    {
        $Paramentros=array($this->municipio,$this->indicador);
        $sql = 'SELECT 
                `variables`.`id_variable`,
		CONCAT_WS(" - ",`variables2`.`descripcion`,
		`variables1`.`descripcion`,
		`variables`.`descripcion`) as "Valor"
		FROM
		`datos`
		LEFT OUTER JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
		LEFT OUTER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
		LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
		LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
		WHERE
		`datos`.`id_municipio` = ? AND `variables`.`id_indicador` = ?
		GROUP BY
		`variables`.`id_variable`
		ORDER BY
		`variables`.`descripcion`,  `variables`.`descripcion` ';
        $Res = $this->TablaDatos($sql,$Paramentros);
        if ($Res === NULL) 
        {
            $sql = 'SELECT 
                    `variables`.`id_variable`,
                    CONCAT_WS(" - ",`variables2`.`descripcion`,
                    `variables1`.`descripcion`,
		    `variables`.`descripcion`) as "Valor"
                    FROM
                    `datos`
                    INNER JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
                    INNER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
                    LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
                    LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
                    WHERE
                    `datos`.`id_municipio` = ? AND `variables1`.`id_indicador` = ?
                    GROUP BY
                    `variables`.`id_variable`
                    ORDER BY
                    `variables2`.`descripcion`,  `variables1`.`descripcion`';
            $Res = $this->TablaDatos($sql,$Paramentros);
        }
        return $Res;
    }

    private function FormatearValores($Datos, $Nombres) {
        $Total = array();
        $Valores = $Datos;
        for ($i = 0; $i < count($Valores); $i++) {
            $name = $Nombres[$i];
            $Total[] = array('name' => $name, 'data' => array($Datos[$i]));
        }
        return $Total;
    }

    public function VerCategorias() {
        $Valores = $this->Categorias();
        return $Valores;
    }

    public function VerValores() {
        $Res = $this->VerCategorias();
        $Datos = Array();
        $Variables = array();
        $Nombres = array();
        $Tabla = array();

        if ($Res !== NULL) {
            foreach ($Res as $valor)
            {
                $Datos[] = $valor;
            }
            for ($i = 0; $i < count($Datos); $i++) 
            {
                $Variables[$i]['name'] = $Datos[$i]['Valor'];
                $Variables[$i]['data'] = $this->LlamarValoresxCategoria($Datos[$i]['id_variable']);
            }
        }
        return($Variables);
    }

}

?>