<?php
@include_once 'usuario.php';
class Usuarios 
{
    private $ds = DIRECTORY_SEPARATOR;
    public function CambiarPass($id_usuario,$Pass)
    {
        $user= new usuario();
        $Pass = md5($Pass);
        $user->CambiarPass($id_usuario, $Pass);
    }
    public function UrlRol()
    {
        $url='#';
        if(!isset($_SESSION)) 
        { 
            session_start();
        }
        switch ($_SESSION['U_rol'])
        {
            case 'Administrador':$url='datos/treemenu';break;
            case 'SuperAdmin':$url='datos/treemenu';break;
            default :$url=FALSE;break;
        }
        return $url;
    }
    public function CerrarSession()
    {
        if(!isset($_SESSION)) 
        { 
            session_start();
        }
        session_destroy();
    }
    public function CrearSession($Res)
    {
        if(!isset($_SESSION)) 
        { 
            session_start();
        }
        $_SESSION['U_id']=$Res['id_usuario'];
        $_SESSION['U_rol']=$Res['Rol'];
        
    }
    private function redireccionar($url='../../login.php')
    {
        header('Location: '.$url);
    }
    public function UsuarioActivo($Rol)
    {
        if(!isset($_SESSION)) 
        {
            session_start();
        }
        if(!isset ($_SESSION['U_id']))
        {
            $this->redireccionar();
        }
        else
        {
            if(($_SESSION['U_rol']!=$Rol))
            {
                $this->redireccionar();
            }
        }
    }
    public function UsuarioActual()
    {
        if(!isset($_SESSION)) 
        { 
            session_start();
        }
        if(isset ($_SESSION['U_id']))
        {
            return ($_SESSION['U_id']);
        }
        else
        {
            $this->CerrarSession();
        }
    }
    public function ValidarUsuarios($Login, $Pass)
    {
        $Estado='';
        $Guardar = new usuario();
        $Pass = md5($Pass);
        $Res = $Guardar->ValidarUsuario($Login, $Pass);
        if(count($Res)==0)
        {
            $Estado=false;
        }
        else
        {
            $Estado=TRUE;
            $this->CrearSession($Res);
        }
        return $Estado;
    }
    public function DatosUsuario($id_usuario)
    {
        $Usuario = new usuario();
        $Datos = $Usuario->DatosUsuario($id_usuario);
        return $Datos;
      
    }
}