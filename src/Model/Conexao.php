<?php
namespace LOJA\Model;
class Conexao{

    private function __construct(){
    }
    public static function getInstance(){
        try {
            //$conexao = new \PDO("mysql:host=localhost; dbname=sistemaemp", "root", "");
            $conexao = new \PDO("mysql:host=mysql17-farm70.uni5.net; dbname=aulaphp", "aulaphp", "senac10058");
            $conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conexao->exec("set names utf8");
            return $conexao;
        } catch (\PDOException $erro) {
            return null;
        }
    }
}
?>