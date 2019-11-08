<?php
namespace LOJA\API; // local desta classe
use LOJA\DAO\DAOUsuario;

class DepartamentoVisualizar{
    public $dados;

    public function __construct(){
        if($_GET['id']){
            try{  
                $DAO = new DAOUsuario();
                $this->dados = $DAO->buscaPorId($_GET['id']);
            }catch(Exception $e){
                $this->dados = $e->getMessage();
            }
        }
    }
}
?>