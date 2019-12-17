<?php 
    use LOJA\includes\Config;

    require "includes/autoload.php";
    session_start();

    @$router = $_GET['model'].$_GET['action'];
    $view = "";

    $config = new Config();
    $url = $config->url;

    switch($router){

        case 'departamentocadastrar':
            \LOJA\includes\Seguranca::restritoAdm();
            $obj = new \LOJA\API\DepartamentoCadastrar;
            $msg = $obj->msg;
            
            $view = "form-departamento.php";
            break;

        case 'departamentolistar':

            \LOJA\includes\Seguranca::restritoAdm();

            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "lista-departamento.php";
            break;

        case 'departamentovisualizar':
            $obj = new \LOJA\API\DepartamentoVisualizar;
            $departamento = $obj->dados;
            $view = "visualiza-departamento.php";
            break;

        case 'clientecadastrar':

            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            
            $obj = new \LOJA\API\ClienteCadastrar;
            $msg = $obj->msg;
            $view = "form-cliente.php";
            break;

        case 'clientelistar':
            $obj = new \LOJA\API\ClienteListar;
            $lista = $obj->lista;
            $view = "lista-cliente.php";
            break;

        case 'clientevisualizar':
            $obj = new \LOJA\API\ClienteVisualizar;
            $cliente = $obj->dados;
            $view = "visualiza-cliente.php";
            break;

        case 'produtocadastrar':
            
            $obj = new \LOJA\API\ProdutoCadastrar;
            $msg = $obj->msg;

            $obj2 = new \LOJA\API\DepartamentoListar;                ;
            $lista = $obj2->lista;

            $view = "form-produto.php";
            break;

        case 'produtolistar':
            $obj = new \LOJA\API\ProdutoListar;
            $lista = $obj->lista;
            $view = "lista-produto.php";
            break;

        case 'produtobuscar':
            $obj = new \LOJA\API\ProdutoBuscaNome;
            $lista = $obj->lista;
            $view = "lista-produto.php";
            break;
        
            case 'fretecalcular':

                $obj = new \LOJA\API\DepartamentoListar;
                $lista = $obj->lista;

                $obj = new \LOJA\API\CalcularFrete;
                $frete = $obj->frete;
                
                $view = "carrinho.php";
            break;
        
        case 'home':
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;

            $obj = new \LOJA\API\ProdutoListar;
            $lista2 = $obj->lista;

            $view = "home.php";
            break;


        case 'loginadm':
            $obj = new \LOJA\API\UsuarioLogar;
            $msg = $obj->msg;
            $view = "form-login-adm.php";
            break;

        case 'loginusuario':

            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            
            $obj = new \LOJA\API\UsuarioLogar;
            $msg = $obj->msg;
            $view = "form-login.php";
            break;

        case 'paineladm':
            $view = "painel-adm.php";
            break;

        case 'painellogoff':
            $obj = new \LOJA\API\UsuarioLogoff;
            $view = "form-login-adm.php";
            break;

        case 'carrinhoadicionar':

            $obj = new \LOJA\API\CarrinhoVisualizar;
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "carrinho.php";
            break;

        case 'carrinhoremover':

            $obj = new \LOJA\API\CarrinhoRemover;
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "carrinho.php";
            break;

        case 'carrinho':
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "carrinho.php";
            break;


            case 'pedidofinalizar':

                \LOJA\includes\Seguranca::restritoUsuario();
                
                $obj = new \LOJA\API\PedidoCadastrar;
                $view = "home.php"; // PÁGINA LOGIN CLIENTE
                break;
               
        default:
            echo "ok";
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;

            $obj = new \LOJA\API\ProdutoListar;
            $lista2 = $obj->lista;

            $view = "home.php";
            break;


    }

    include "View/{$view}";
   
?>

