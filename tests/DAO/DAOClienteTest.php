<?php
use PHPUnit\Framework\TestCase;
use LOJA\Model\Cliente;
use LOJA\DAO\DAOCliente;


class DAOClienteTests extends TestCase
{
    /**
     * @before
     */
    public function setUpDeleteAll(){

    }
    
  public function testCadastro()
  {
   
     $c = new Cliente();
     //$c->setId();
     $c->setNome('Daniel 55');
     $c->setTelefone('(21)1231-2132');
     $c->setEmail('daniel@email.com');
     $c->setCpf('123.456.789-10');

     $DAO = new DAOCliente();
     $result = $DAO->cadastrar($c);
     $this->assertTrue($result>0);
    
  }  }  ?>