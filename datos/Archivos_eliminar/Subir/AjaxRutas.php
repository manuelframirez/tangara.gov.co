<?php
$url=$_POST['url'];
var_dump($url);
session_start();
$_SESSION['url']=$url;
?>