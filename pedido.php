<?php
class Pedido{
    public $cliente;
    public $pedido= [];
    public function __construct($cliente,$pedido) {
        $this->cliente = $cliente;
        $this->pedido = $pedido;
    }
    public function  adicionarItem(Produto $produto, int $quantidade){
        array_push($this->pedido, $quantidade,$produto);
    }
    
}






















?>