<?php
include_once('adodb5/adodb.inc.php');
class conexion 
{
    private $con;
    function __construct()
    {
        $User = 'root';
        $Pass = '';
        $BaseDatos = 'gobernacion';
        $Host = 'localhost';
        $this->con = ADONewConnection('mysql');
        $this->con->PConnect($Host, $User, $Pass, $BaseDatos);
        $this->con->execute("SET NAMES utf8");
    }
    public function DoSql($sql)
    {
        $Res = $this->con->Execute($sql);
        return $Res;
    }
    public function TablaDatos($sql)
    {
        $Res=NULL;
        $datos=$this->DoSql($sql);
        while (!$datos->EOF) 
        {
            $Res[] = $datos->fields;
            $datos->MoveNext();
        }
        return $Res;
    }
    public function Id()
    {
        return $this->con->Insert_ID();
    }
}
?>