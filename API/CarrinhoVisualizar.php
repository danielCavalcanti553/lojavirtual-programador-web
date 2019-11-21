<?php
namespace LOJA\API; 
use LOJA\DAO\DAOProduto;
use LOJA\Model\Carrinho;
use LOJA\Model\Item;
use LOJA\Model\Produto;

class CarrinhoVisualizar{

    public $carrinho;
  
    function __construct(){

        $qtd = str_replace("qtd=","",$_GET['qtd']);
        $id = $_GET['id'];
            
        $_SESSION['carrinho'] = null;
        $add = true;

        if(isset($_SESSION['carrinho'])){
            $this->carrinho = unserialize($_SESSION['carrinho']);
            foreach($this->carrinho->getItems() as $item) {
                if($item->getProduto()->getId()===$id){
                    $add= false;
                };
                
            }

        }else{
            echo "Não Existe carrinho";
            $this->carrinho = new Carrinho();
        }

        var_dump($add)."<br/><br/><br/><br/>";

        if($add===true){
            
            $dao = new DAOProduto();
            $obj = new Produto();
            $obj = $dao->buscaPorId($id);
            
            $item = new Item();
            $item->setProduto($obj);
            $item->setQuantidade($qtd);

            if(!$obj==null){
                $this->carrinho->addItem($item);
            }
        
        
        $_SESSION['carrinho'] = serialize($this->carrinho);
    }

    //print_r(unserialize($_SESSION['carrinho']));

    }
}