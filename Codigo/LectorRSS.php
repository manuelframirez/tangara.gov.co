<?php
include_once 'RssItem.php';
class LectorRSS 
{
    var $url;
    var $data;
    function LectorRSS($url) 
    {
        $this->url;
        $this->data = (implode('', file($url)));
    }
    private function obtener_items() 
    {
        preg_match_all("/<entry .*>.*<\/entry>/xsmUi", $this->data, $matches);
        $items = array();
        foreach ($matches[0] as $match) 
        {
            $items[] = new RssItem($match);
        }
        return $items;
    }
    public function LinkItems()
    {
        $Datos='';
        $Items=$this->obtener_items();
        for ($i=0; $i < 3; $i++) 
        {
            $item = $Items[$i];    
            $Datos.='<li><a href="'.($item->obtener_url()).'"><p align="justify">'.($item->obtener_titulo()).'</p></a></li>';
        }
        return $Datos;
    }

    public function VerItems()
    {
        $Datos='';
        $Items=$this->obtener_items();
        foreach ($Items as $item) 
        {
            $Temp['url']=($item->obtener_url());
            $Temp['titulo']=($item->obtener_titulo());
            $Datos[]=$Temp;
            
        }
        return $Datos;
    }
}
?>