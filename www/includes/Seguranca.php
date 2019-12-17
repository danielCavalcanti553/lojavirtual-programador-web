<?php
namespace LOJA\includes;
use LOJA\includes\Config;
class Seguranca{
  
    public static function restritoAdm(){

        $config = new Config();
        if(!isset($_SESSION['usuarioid'])){
            header("location: {$config->url}/login/adm");

        }
    }

    public static function restritoUsuario(){

        $config = new Config();
        if(!isset($_SESSION['usuarioid'])){
            header("location: {$config->url}/login/usuario");

        }
    }
}