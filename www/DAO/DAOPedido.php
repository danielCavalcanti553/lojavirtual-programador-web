<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Pedido;
use LOJA\Model\Item;
use LOJA\Model\Carrinho;

// pk_pedido	data_pedido	frete	dias	fk_cliente = 17
class DAOPedido{

    public function cadastrar(Pedido $pedido, Carrinho $carrinho){
        $pdo = Conexao::getInstance();
        $pdo->beginTransaction();
        
        try{

            $sql = "INSERT INTO pedido
                VALUES (default, :data_pedido, :frete, :dias, :fk_cliente)";

            $con = $pdo->prepare($sql);
            $con->bindValue(":data_pedido", $pedido->getData());
            $con->bindValue(":frete", $pedido->getFrete());
            $con->bindValue(":dias", $pedido->getDias());
            $con->bindValue(":fk_cliente", $pedido->getCliente()->getId());
            $con->execute();
            $lastId = $pdo->lastInsertId();

            

            $sql = "INSERT INTO item 
            VALUES (:fk_produto, :fk_pedido, :quantidade)";
        
            $sql = "INSERT INTO item 
            VALUES (:fk_produto, :fk_pedido, :quantidade)";
   
            $con2 = $pdo->prepare($sql);
            

            foreach ($carrinho->getItems() as $item){
                print_r($item->getProduto()->getId());
                $con2->bindValue(":fk_produto", $item->getProduto()->getId());
                $con2->bindValue(":fk_pedido", $lastId);
                $con2->bindValue(":quantidade", $item->getQuantidade());
                $con2->execute();
            }

            $pdo->commit();
            $_SESSION['carrinho'] = null;
            return "Pedido efetuado com sucesso";

        }catch(Exception $e){

            $pdo->rollback();
            return "Erro ao efetuar o pedido";
        }
    }
}