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
        $sql = 'SELECT 
        `categoria`.`Nombre`
        FROM
        `datos`
        LEFT OUTER JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
        LEFT OUTER JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
        LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
        LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
        WHERE
        `datos`.`id_municipio` =  "' . $this->municipio . '" AND 
	`variables`.`id_indicador` =  "' . $this->indicador . '"
        GROUP BY  categoria.Nombre
        ORDER BY `categoria`.`Nombre`';
        $con = new conexion();
        $Res = $con->TablaDatos($sql);
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
			  `datos`.`id_municipio` = "' . $this->municipio . '" AND 
			  `variables1`.`id_indicador` = "' . $this->indicador . '"
			GROUP BY `categoria`.`Nombre` ORDER BY `categoria`.`Nombre`';

            $Res = $con->TablaDatos($sql);
        }
        return $Res;
    }    
    

    private function FormatearCategorias($Datos) {
        $Total = array();
        for ($i = 0; $i < count($Datos); $i++) {
            $Total[] = $Datos[$i][0];
        }
        return $Total;
    }

    private function LlamarValoresxCategoria($Categoria) {
        $con = new conexion();
        $sql = 'SELECT 
			  IFNULL(`datos`.`Valor`,0) as "Valor"
			FROM
			  `datos`
			  left JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
			  left JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
				  WHERE
				  `variables`.`id_indicador` = "' . $this->indicador . '" AND 
				  `datos`.`id_municipio` = "' . $this->municipio . '" AND 
				   `variables`.`id_variable` = "' . $Categoria . '"
                        GROUP BY  `categoria`.`Nombre`';
        $Res = $con->TablaDatos($sql);
        if ($Res === NULL) {
            $sql = 'SELECT 
			  IFNULL(`datos`.`Valor`,0) as "Valor"
			FROM
			  `datos`
			  left JOIN `categoria` ON (`datos`.`id_categoria` = `categoria`.`id_categoria`)
			  left JOIN `variables` ON (`datos`.`id_variable` = `variables`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables1` ON (`variables`.`id_padre` = `variables1`.`id_variable`)
			  LEFT OUTER JOIN `variables` `variables2` ON (`variables1`.`id_padre` = `variables2`.`id_variable`)
				  WHERE
				  `variables1`.`id_indicador` = "' . $this->indicador . '" AND 
				  `datos`.`id_municipio` = "' . $this->municipio . '" AND 
				   `variables`.`id_variable` = "' . $Categoria . '"
                        GROUP BY  `categoria`.`Nombre`';
            $Res = $con->TablaDatos($sql);
        }
        $Res = $this->FormatearCategorias($Res);
        return $Res;
    }

    private function Categorias() {
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
			  `datos`.`id_municipio` = "' . $this->municipio . '" AND 
			  `variables`.`id_indicador` = "' . $this->indicador . '"
			GROUP BY
			  `variables`.`id_variable`
			ORDER BY
			  `variables`.`descripcion`,  `variables`.`descripcion` ';
        
        $con = new conexion();
        $Res = $con->TablaDatos($sql);
        if ($Res === NULL) {
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
			  `datos`.`id_municipio` = "' . $this->municipio . '" AND 
			  `variables1`.`id_indicador` = "' . $this->indicador . '"
			GROUP BY
			  `variables`.`id_variable`
			ORDER BY
			  `variables2`.`descripcion`,  `variables1`.`descripcion`';

            $Res = $con->TablaDatos($sql);
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
            for ($i = 0; $i < count($Datos); $i++) {
                $Variables[$i]['name'] = $Datos[$i][1];
                $Variables[$i]['data'] = $this->LlamarValoresxCategoria($Datos[$i][0]);
            }
        }
        return($Variables);
    }

}

?>