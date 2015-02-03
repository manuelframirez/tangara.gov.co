<?php
include_once '../datos/sec/Usuarios.php';
$Validar = new Usuarios();
$Login=$_POST['Login'];
$Pass=$_POST['Pass'];
if($Validar->ValidarUsuarios($Login, $Pass))
{
    echo json_encode($Validar->UrlRol());
}
else
{
    echo json_encode(FALSE);
}
