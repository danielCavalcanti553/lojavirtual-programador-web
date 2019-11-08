<?php 

    require "includes/autoload.php";
    $router = $_GET['model'].$_GET['action'];
    
    $view = "";

    switch($router){

        case 'departamentocadastrar':
            
            $obj = new \LOJA\API\DepartamentoCadastrar;
            $msg = $obj->msg;
            $view = "form-departamento.php";
            break;

        case 'departamentolistar':
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

        default:
            echo "default";
        break;
    }

    include "view/{$view}";

?>

