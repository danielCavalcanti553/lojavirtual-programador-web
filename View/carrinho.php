<?php include "view/header-loja.php" ?>

<div class="row">
    <?php
    
        $carrinho = unserialize($_SESSION['carrinho']);
        print_r($carrinho->getItems()->getProduto());
    ?>
   
</div>


<?php include "view/footer.php" ?>


               