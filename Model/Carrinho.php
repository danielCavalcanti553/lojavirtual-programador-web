<?php

namespace LOJA\Model;
use LOJA\Model\Item;

class Carrinho{
	
    private $id;
    private $lista;

    public function __construct(){
		$this->lista = [];
	}
	
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function addItem(Item $item){
		
		array_push($this->lista,$item);
	}

	public function removeItem($id){
		$item;
		foreach($this->lista as $item){
			if($item->getProduto()->getId()===$id){
				$item = $item->getProduto();
			};
		}
		$index = array_search($item, $this->lista, true);
		unset($this->lista[$index]);
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
