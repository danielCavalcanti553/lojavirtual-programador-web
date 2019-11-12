<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Produto;
class DAOProduto{

    public function cadastrar(Produto $produto){
        $sql = "INSERT INTO produto 
            VALUES (default, :nome, :preco, :descricao, :imagem, :departamento)";
        
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":nome", $produto->getNome());
        $con->bindValue(":preco", $produto->getPreco());
        $con->bindValue(":descricao", $produto->getDescricao());
        $con->bindValue(":imagem", $produto->getImagem());
        // $produto->getDepartamento() um objeto da classe departamento
        // entao $produto->getDepartamento()->getId()  retorna o id do departamento
        $con->bindValue(":departamento", $produto->getDepartamento()->getId());
        $con->execute();
        
        return "Cadastrado com sucesso";
    }

    public function listaProduto(){
       
        $sql = "SELECT
                produto.nome,
                produto.preco,
                produto.imagem,
                produto.pk_produto as 'id',
                departamento.nome as 'departamento'
                    
                FROM produto
                INNER JOIN departamento
                ON produto.fk_departamento_produto = departamento.pk_departamento";


        
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        $lista = array();

        while($produto = $con->fetch(\PDO::FETCH_ASSOC)) {
            $lista[] = $produto;
        }
        return $lista;
    }
}
?>
