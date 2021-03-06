<?php include "view/header.php" ?>
<form class="form-horizontal" method="post" action="<?php echo $url; ?>/cliente/visualizar/<?php echo $_GET['id']; ?>">
        <fieldset>

        <!-- Form Name -->
        <legend>Cadastro</legend>

        <input id="id" name="id" value="<?php echo $cliente['pk_cliente']; ?>" type="hidden">

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="nome">Nome</label>  
        <div class="col-md-4">
        <input id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" type="text" placeholder="" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="telefone">Telefone</label>  
        <div class="col-md-4">
        <input id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" type="text" placeholder="" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="email">E-mail</label>  
        <div class="col-md-4">
        <input id="email" name="email" type="text" value="<?php echo $cliente['email']; ?>" placeholder="" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="cpf">CPF</label>  
        <div class="col-md-4">
        <input id="cpf" name="cpf" type="text" placeholder="" value="<?php echo $cliente['cpf']; ?>"  class="form-control input-md" required="">
            
        </div>
        </div>

        <div class="form-group">
        <label class="col-md-4 control-label" for="cpf">CPF</label>  
        <div class="col-md-4">
        <input id="senha" name="senha" type="password" placeholder="" value="<?php echo $cliente['senha']; ?>"  class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton"></label>
        <div class="col-md-4">
            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Atualizar</button>
        </div>
        </div>

        </fieldset>
        </form>
        
        <?php include "view/footer.php" ?>