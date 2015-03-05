<?php

class Visual {

    public function GenerardorLink($Url, $Click='',$image = '', $texto = '') {
        $Script = '';
        if($Click!='')
        {
            $Script = '<input src="'.$image.'" type="image" onclick="'.$Click.';">';
        }
        else
        {
        if ($image != '')
            $Script = "<a href=\"$Url\"><img src=\"$image\"></a>";
        else
            $Script = "<a href=\"$Url\">$texto</a>";
        }
        return $Script;
    }

    public function CambiarDatos($Datos, $Valores) {
        $Valor = "<table border=1>\n";
        for ($i = 0; $i < count($Datos); $i++) {
            $Valor.="<tr>";
            $Valor.="<td>$Datos[$i]</td><td>$Valores[$i]</td>\n";
            $Valor.="</tr>";
        }
        $Valor.="</table>\n";
        return $Valor;
    }

    public function TextBox($nombre, $Valor, $id) {
        if ($id != '') {
            $id = "id=\"$id\"";
        }
        if ($Valor != '') {
            $Valor = " value=\"$Valor\" ";
        }
        return "<input name=\"$nombre\"	$id $Valor type=\"text\" />";
    }

    private function CombinarColumnas($Datos, $ColumnasCombinar) {

        $tabla = '';
        $Duplicado = '';
        $DatosFinales = '';
        $Nombre = array();
        $Cant = array();
        $Anterior = '';
        if ($ColumnasCombinar !== NULL && $ColumnasCombinar !== '') {
            foreach ($Datos as $Temp1) {
                $Temp2 = '';
                for ($i = 0; !empty($Temp1[$i]); $i++) {
                    if (in_array($i, $ColumnasCombinar)) {
                        $Temp2[$i] = $Temp1[$i];
                        $Cant[$i] = 1;
                    }
                }
                $Nombre[] = $Temp2;
            }
        }
        for ($j = 0; $j < count($Datos); $j++) {
            $Temp3 = $Datos[$j];
            $tabla.='<tr>';
            for ($i = 0; !empty($Temp3[$i]); $i++) {
                if ($ColumnasCombinar !== NULL && $ColumnasCombinar !== '') {

                    if (in_array($i, $ColumnasCombinar)) {
                        if ($j == 0) {
                            $Anterior[$i] = $Nombre[$j][$i];
                        }
                        if (!empty($Anterior[$i]) && $Anterior[$i] == $Nombre[$j][$i]) {
                            $Cant[$i] = $Cant[$i] + 1;
                            $Duplicado[$i] = '<td   rowspan="' . $Cant[$i] . '" VALIGN="MIDDLE" align="center">' . $Temp3[$i] . '</td>';
                        } else {
                            $Anterior[$i] = $Nombre[$j][$i];
                            $Cant[$i] = 1;
                            $tabla.=$Duplicado[$i];
                            $Duplicado[$i] = '<td VALIGN="MIDDLE" align="center">' . $Temp3[$i] . '</td>';
                        }
                    } else {
                        $tabla.='<td VALIGN="MIDDLE" align="center">' . $Temp3[$i] . '</td>';
                    }
                } else {
                    $tabla.='<td VALIGN="MIDDLE" align="center">' . $Temp3[$i] . '</td>';
                }
            }
            $tabla.='</tr>';
        }
        $tabla.="</table>";
        return $tabla;
    }

    public function Tabla($Datos, $Encabezado, $Id, $Class, $Border, $ColumnasCombinar = '') 
    {
        if ((count($Datos) > 0 && $Datos[0] !== '' && $Datos !== NULL)) 
        {
            if ($Id != '') 
            {
                $Id = " id=\"$Id\" ";
            }
            if ($Class != "") 
            {
                $Class = " class=\"$Class\" ";
            }
            if ($Border != '') 
            {
                $Border = " border=\"$Border\" ";
            }
            $tabla = "<table$Border$Id$Class>\n";
            foreach ($Encabezado as $Temp) 
            {
                $tabla.="<th><center>$Temp</center></th>";
            }
            $total = count($Encabezado);
            foreach ($Datos as $Temp1) 
            {
                $tabla.='<tr valign="top">';
                for ($i = 0; $i < $total; $i++) 
                {

                    $tabla.="<td valign=top align=\"center\">$Temp1[$i]</td>";
                }
                $tabla.='</tr>';
            }
            $tabla.="</table>";
            return $tabla;
        }
    }

    private function Inciar($Datos, $Value, $Valueid = '') {
        if ($Value == NULL && $Valueid == NULL) {
            $Valores = array();
            $temp = array(0 => '0', 1 => 'SELECCIONE');
            $Valores[] = $temp;
            for ($i = 0; $i < count($Datos); $i++) {
                $Valores[] = $Datos[$i];
            }
            $Datos = $Valores;
        }
        return $Datos;
    }

    public function Select($Datos, $Nombre, $Value, $id = '', $onchange = '', $Valueid = '', $Style='') 
    {
        error_reporting(0);
        $Nombre = "name=\"$Nombre\"";
        if ($id != '' && $id != NULL) {
            $id = "id=\"$id\"";
        }
        if($Style!='')
        {
            $Style="style=\"$Style\"";
        }
        if ($onchange != '') {
            $onchange = " onchange=\"$onchange\"";
        }
        $Select = "<select $Nombre$id$onchange $Style>\n";
        $total = count($Datos);
        $Datos = $this->Inciar($Datos, $Value, $Valueid);
        if ($total > 0 && $Datos != '') {
            foreach ($Datos as $Temp) {
                if ($Value == $Temp[0] || $Valueid == $Temp[1]) {
                    $Select.="	<option SELECTED value=\"$Temp[0]\">$Temp[1]</option>\n";
                } else {
                    $Select.="	<option value=\"$Temp[0]\">$Temp[1]</option>\n";
                }
            }
        }
        $Select.='</select>';
        return $Select;
    }

    public function VerDatos($Datos) {
        $Res = '';
        for ($i = 0; $i < count($Datos); $i++) {
            $Res.="'$Datos[$i]'";
            if ($i < count($Datos) - 1) {
                $Res.=',';
            }
        }
        return $Res;
    }

}

?>