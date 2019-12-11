<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Cliente;

class DAOCliente{

    public function cadastrar(Cliente $cliente){

        $pdo = Conexao::getInstance();
        $pdo->beginTransaction();

        try{

            $con = $pdo->prepare("
                INSERT INTO cliente VALUES (default, :nome, :telefone, :email, :cpf)"
            );

            $con->bindValue(":nome", $cliente->getNome());
            $con->bindValue(":telefone", $cliente->getTelefone());
            $con->bindValue(":email", $cliente->getEmail());
            $con->bindValue(":cpf", $cliente->getCpf());
            $con->execute();

            $lastId = $pdo->lastInsertId();
            $pdo->commit();
            return $lastId;

        }catch(Exception $e){
            $pdo->rollback();
            return 0;
        }

    }

    public function listaClientes(){
       
        $sql = "SELECT * FROM cliente";  
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        
        $lista = array();

        while($cliente = $con->fetch(\PDO::FETCH_ASSOC)) {
            $lista[] = $cliente;
        }

        return $lista;

    }

    public function buscaPorId($id){
        $sql = "SELECT * FROM cliente WHERE pk_cliente = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":id", $id);  
        $con->execute();
        
        $cliente = new Cliente();
        $cliente = $con->fetch(\PDO::FETCH_ASSOC);
        //print_r($usuario); // testar saída
        return $cliente;
    }

    public function deleteAll(){
        $sql = "delete from cliente";   
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        return "Excluído Todos com sucesso";
    }

}
?>
