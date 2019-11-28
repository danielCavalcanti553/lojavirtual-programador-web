<?php include "view/header-loja.php" ?>

<div class="row">
    <?php
        $carrinho = $_SESSION['carrinho'];

        if(empty($carrinho->getItems())){
            // Inicio HTML
            ?>
                <p>Seu Carrinho está vazio</p>

            <?php
            // Fim HTML
        }else{

            foreach ($carrinho->getItems() as $item){
                $produto = $item->getProduto();
                $link = "http://localhost/lojavirtual/carrinho/remover/".$produto->getId();
             
                // Inicio HTML
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

     <?php   
     // Fim HTML
            }
        }
    ?>
           
</div>


<?php include "view/footer.php" ?>


               