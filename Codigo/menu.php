<?php
include_once 'BaseDatos/conexion.php';
class ListadoMenu 
{
    private $html = '';
    private $dimensions;
    private function Dimension()
    {
        $db = App::$base;
        $sql='SELECT * FROM dimension ORDER BY `Descripcion`';
        $res = $db->dosql($sql, array());
        $Datos=array();
        while (!$res -> EOF) 
        {
            $Datos[]=$res->fields;
            $res->MoveNext();
        }
        return $Datos;
    }
    private function Tematica($id_dimension)
    {
        $db = App::$base;
        $sql='SELECT * FROM tematica WHERE fk_Dimension = ? ORDER BY `Descripcion`';
        $res = $db->dosql($sql, array($id_dimension));
        $Datos=array();
        while (!$res -> EOF) 
        {
            $Datos[]=$res->fields;
            $res->MoveNext();
        }
        return $Datos;
    }
    private function indicadores($fk_tematica)
    {
        $db = App::$base;
        $sql='SELECT * FROM indicadores WHERE fk_tematica = ? ORDER BY `Nombre`';
        $res = $db->dosql($sql, array($fk_tematica));
        $Datos=array();
        while (!$res -> EOF) 
        {
            $Datos[]=$res->fields;
            $res->MoveNext();
        }
        return $Datos;        
    }
    public function menu() 
    {
        $Dimension=$this->Dimension();
        $dimensiones_html = '<ul class="grid-100 grid-parent">';
        foreach ($Dimension as $row)
        { 
                $li_a_dimension = new li_a($row["id_dimension"], $row["Descripcion"], '', '#');
                $Tematica =  $this->Tematica($row["id_dimension"]);
                $tematica_html = '<ul class="submenu">';
                foreach($Tematica as $row_tematica) 
                {
                    $li_a_tematica = new li_a($row_tematica["id_tematica"], $row_tematica["Descripcion"], '', '#', 'desp');
                    $Indicadores = $this->indicadores($row_tematica["id_tematica"] );
                    $indicadores_html = '<ul class="submenu2">';
                    foreach($Indicadores as $row_indicadores)
                    {
                        $li_a_indicadores = new li_a($row_indicadores["id_indicadores"], $row_indicadores["Nombre"], 'javascript:Filtrar(' . $row_indicadores["id_indicadores"] . ')', '');
                        $indicadores_html .= $li_a_indicadores->generate();    
                    }
                    $indicadores_html .= "\n</ul>\n";
                    $li_a_tematica->aditional_code = $indicadores_html;
                    $tematica_html .= $li_a_tematica->generate();
                }
                $tematica_html .= "\n</ul>\n";
                $li_a_dimension->aditional_code = $tematica_html;
                $dimensiones_html .= $li_a_dimension->generate();
            }
            $dimensiones_html .= "\n</ul>\n";
            return $dimensiones_html;
        }
}
class li_a 
{
    private $html = '';
    private $id;
    private $title;
    private $link;
    private $aditional_code;
    private $ClassLI;
    public function __construct($id, $title, $link, $aditional_code, $classLI = '') 
    {
        $this->id = $id;
        $this->title = $title;
        $this->link = $link;
        $this->aditional_code = $aditional_code;
        $this->ClassLI = $classLI;
    }

    public function generate() 
    {
        if ($this->ClassLI != '') 
        {
            $this->ClassLI = ' class="' . $this->ClassLI . '"';
        }
        $this->html .= "<li $this->ClassLI><a id=\"{$this->id}\" href=\"{$this->link}\">{$this->title}</a>{$this->aditional_code}</li>";
        return $this->html;
    }
    public function __set($var, $value) 
    {
        $temp = strtolower($var);
        if (property_exists('li_a', $temp)) 
        {
            $this->$temp = $value;
        }
        else 
        {
            echo $var . " does not exist.";
        }
    }
}
?>