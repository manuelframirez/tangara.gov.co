<?php
include_once 'LectorRSS.php';
$url='http://www.cauca.gov.co/index.php?format=feed&type=atom';
$noticias = new LectorRSS($url);
echo  $noticias->LinkItems();
