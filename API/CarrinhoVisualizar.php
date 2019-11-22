<?php
namespace LOJA\API; 
use LOJA\DAO\DAOProduto;
use LOJA\Model\Carrinho;
use LOJA\Model\Item;
use LOJA\Model\Produto;


class CarrinhoVisualizar{

    function __construct(){

        $carrinho;

        @$qtd = str_replace("qtd=","",$_GET['qtd']);
        $id = $_GET['id'];
        $add = true;

        //$_SESSION['carrinho'] = null; unset($_SESSION['carrinho']);
        
        if(isset($_SESSION['carrinho'])){
            $carrinho = $_SESSION['carrinho'];
            
            foreach($carrinho->getItems() as $item) {
                if($item->getProduto()->getId()===$id){
                    $add= false;
                    
                };   
            }
        }else{
            
            $carrinho = new Carrinho();
        }

        if($add===true){
        
            $dao = new DAOProduto();
            $obj = new Produto();
            $obj = $dao->buscaPorId($id);

            if($obj->getId()){
                $item = new Item();
                $item->setProduto($obj);
                $item->setQuantidade($qtd);
                $carrinho->addItem($item);
            };

            $_SESSION['carrinho'] = $carrinho;
            
    }
    
    

    

    }
}