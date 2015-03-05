<?php

@include_once '../BaseDatos/conexion.php';
@include_once '../../BaseDatos/conexion.php';

class usuario {

    public function CambiarPass($id_usuario, $Pass) {/*
      $t = atable::Make('usuario');
      $t->load("id_usuario = '$id_usuario'");
      $t->pass=$Pass;
      $t->Save();
     */
    }

    public function ValidarUsuario($Login, $Pass) {
        $con = App::$base;
        $sql = "SELECT 
                `login`,
                `id_usuario`,
                `Rol`
              FROM
                `usuario` where login = ? 
                and Pass=?";
        $dat = $con->dosql($sql, array($Login, $Pass));
        $Res = NULL;
        if (!$dat->EOF) {
            $Res = $dat->fields;
            $dat->MoveNext();
        }
        return $Res;
    }

    public function VerUsuario($id_usuario) {/*
      $t = atable::Make('usuario');
      $t->load("id_usuario = '$id_usuario'");
      $Datos=array(
      'login'=>$t->login,
      'Rol'=>$t->rol,
      'id_cliente'=>$t->id_cliente);
      return $Datos;
     */
    }

    public function DatosUsuario($id_usuario) {/*
      $db = App::$base;
      $Datos=array();
      $sql="SELECT
      `usuario`.`id_usuario`,
      `usuario`.`login`,
      `usuario`.`pass`,
      `usuario`.`Rol`,
      `cliente`.`id_cliente`,
      `cliente`.`Nombres`,
      `cliente`.`Apellidos`,
      `cliente`.`Numero_identificacion`,
      `cliente`.`tipo_identificacion`,
      `cliente`.`Celular`,
      `cliente`.`Email`,
      `cliente`.`Foto`
      FROM
      `usuario`
      INNER JOIN `cliente` ON (`usuario`.`id_cliente` = `cliente`.`id_cliente`)
      where
      `usuario`.`id_usuario`=?";
      $res = $db->dosql($sql, array($id_usuario));
      if(!$res -> EOF)
      {
      $Datos=$res->fields;
      $res->MoveNext();
      }
      return $Datos;

     */
    }

}
