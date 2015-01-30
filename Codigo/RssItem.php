<?php

class RssItem 
{
    var $title, $url;
    function RssItem($xml) 
    {
        $this->FormatearDatos($xml);
    }
    function FormatearDatos($xml) 
    {
        preg_match('/<title> (.*) <\/title>/xsmUi', $xml, $matches);
        $this->title = $matches[1];
        preg_match('/<id> (.*) <\/id>/xsmUi', $xml, $matches);
        $this->url = $matches[1];
    }
    function obtener_titulo() 
    {
        return $this->title;
    }
    function obtener_url() 
    {
        return $this->url;
    }

}
?>