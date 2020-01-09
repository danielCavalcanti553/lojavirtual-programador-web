<?php
namespace LOJA\API; // local desta classe
use LOJA\DAO\DAOCliente;
use LOJA\Model\Cliente;

class ClienteLogar{
    public $msg;

    function __construct(){
        if($_POST){
            try{
                $obj = new Cliente();
                $obj->setNome($_POST['email']);
                $obj->setSenha($_POST['senha']);

                $DAO = new DAOCliente();
    
                $result = $DAO->buscaPorEmailSenha($obj);
                
                if($result){ 
                    
                    $_SESSION['clienteid'] = $result['id'];
                    $_SESSION['clientenome'] = $result['nome'];

                    header("location: http://localhost/lojavirtual/painel/adm");
                }else{
                    $this->msg = "E-mail/Senha inválidos"; 
                }
                
            }catch(\Exception $e){
                $this->msg = $e->getMessage();
            }
    }
    }

}