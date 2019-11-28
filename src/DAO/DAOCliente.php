<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Cliente;

class DAOCliente{

    public function cadastrar(Cliente $cliente){
        $sql = "INSERT INTO cliente 
            VALUES (default, :nome, :telefone, :email, :cpf)";
        
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":nome", $cliente->getNome());
        $con->bindValue(":telefone", $cliente->getTelefone());
        $con->bindValue(":email", $cliente->getEmail());
        $con->bindValue(":cpf", $cliente->getCpf());
        $con->execute();

        return "Cadastrado com sucesso";
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

}
?>
