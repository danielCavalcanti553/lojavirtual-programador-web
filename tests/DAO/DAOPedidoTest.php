<?php
use PHPUnit\Framework\TestCase;
use LOJA\Model\Cliente;
use LOJA\DAO\DAOCliente;
use LOJA\Model\Conexao;
use LOJA\Model\Pedido;

class DAOPedidoTests extends TestCase
{

    public $cliente;

    /**
     * @before
     */
    public function setUpInit(){

      $pdo = Conexao::getInstance();
      $pdo->beginTransaction();

      $con = $pdo->prepare("
        INSERT INTO cliente VALUES (default, :nome, :telefone, :email, :cpf)"
      );
      
      $con->bindValue(":nome", 'Daniel');
      $con->bindValue(":telefone", '(21)1231-2132');
      $con->bindValue(":email", 'daniel@email.com');
      $con->bindValue(":cpf", '123.456.789-10');
      $con->execute();
      
      $c = new Cliente();
      $c->setId($pdo->lastInsertId());
      $this->idcliente = $c;
    

    }
    
  public function testCadastro()
  {
    


     $p = new Pedido();
     //$c->setId();
     $p->setData('2019-12-25');
     $p->setFrete(20.00);
     $p->setDias(5);
     $p->setCliente($this->cliente);
      
    

  }  }  ?>
