<?php

namespace LOJA\Model;
use LOJA\Model\Item;

class Carrinho{
	
    private $id;
    private $lista;

    public function __construct(){
	}
	
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function addItem(Item $item){
		$this->lista[] = $item;
	}

	public function getItems(){
		return $this->lista;
	}

	public function getLista(){
		return $this->lista;
	}

	public function setLista($lista){
		$this->lista = $lista;
	}
}
