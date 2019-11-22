<?php include "view/header-loja.php" ?>

<div class="row">
    <?php
        $carrinho = $_SESSION['carrinho'];
        foreach ($carrinho->getItems() as $item){
            $produto = $item->getProduto();
            $link = "http://localhost/lojavirtual/carrinho/remover/".$produto->getId();
            ?>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-2"><img width="100%" src="<?php echo $url.'/View/img/produtos/'.$produto->getImagem(); ?>"></div>
                <div class="col-md-10">
                <p><?php echo $produto->getNome(); ?></p>
                <a href="<?php echo $link; ?>" class="btn btn-danger">Remover</a>
                
                </div>
            </div>
        </div>

     <?php   }
    ?>
           <div class="col-md-4">
            Dados compra
            </div>
</div>


<?php include "view/footer.php" ?>


               