<?php
namespace LOJA\includes;
class Config{

    private $servidor = "TEST"; // PROD OU TEST

    public $url;
    public $serverHost;
    public $serverDB;
    public $serverUser;
    public $serverPass;
    public $cepOrigem;

    public function __construct(){

        if($this->servidor=="TEST"){
            $this->url = "http://localhost/lojavirtual/src";
            $this->serverHost = "localhost";
            $this->serverDB = "sistemaemp";
            $this->serverUser = "root";
            $this->serverPass = "";
            $this->cepOrigem = "21852070";
        }else{
            $this->url = "";
            $this->serverHost = "mysql17-farm70.uni5.net";
            $this->serverDB = "aulaphp";
            $this->serverUser = "aulaphp";
            $this->serverPass = "senac10058";
            $this->cepOrigem = "21852070";  
        }
    }

    
}
?>

