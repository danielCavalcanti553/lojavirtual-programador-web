<?php
namespace LOJA\API; 
use LOJA\DAO\DAOProduto;
use LOJA\Model\Carrinho;
use LOJA\Model\Item;
use LOJA\Model\Produto;


class CarrinhoRemover{

    function __construct(){

        $carrinho = new Carrinho;
        $id = $_GET['id'];
        
        $add = true;

        if(isset($_SESSION['carrinho'])){
            $carrinho = $_SESSION['carrinho'];
            
            foreach($carrinho->getLista() as $item) {
                if($item->getProduto()->getId()===$id){
                    
                    $carrinho->removeItem($id);
                    
                
                    $_SESSION['carrinho'] = $carrinho;

                };   
            }
        }else{
            header("location: http://localhost/lojavirtual/home");
        }

   


  
    }
}