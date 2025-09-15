<?php

class produto {
    public int $estoque;
    public $nome;
    public float $preco;

    public function __construct($estoque,$nome,$preco) {
        $this->estoque = $estoque;
        $this->nome = $nome;
        $this->preco = $preco;
    }


    public function aplicarDesconto(float $percentual){
        if ($percentual<=1){
            $this-> preco = $this-> preco*(1-$percentual);
            echo"o novo preço é $this->preco";
        }
        else{
            $this-> preco = $this-> preco*(1-($percentual/100));
            echo"o novo preço é $this->preco";
    }
        }
    public function vender(int $quantidade){
        if ($quantidade>=1){
            $this-> estoque = $this-> estoque-$quantidade;;
            echo"o novo estoque é $this->estoque";
        }
        else{
            echo"NAO POSSUI ESTOQUE";
        }
    }
    public function resumo(){
        echo"$this->preco $this->nome $this->estoque";
    }
}
$maca= new produto(10,"maca",100);

$maca->resumo();

$maca->vender(5);

$maca->aplicarDesconto(10);

class Pedido{
    public $cliente;
    public $pedido= [];
    public $total;
    public $sim;
    public function __construct($cliente,) {
        $this->cliente = $cliente;
    }
    public function  adicionarItem(Produto $produto, int $quantidade){
        array_push($this->pedido, $quantidade,$produto);
    }
    public function total(){
        for ($x=1; $x<sizeof($this->pedido);$x+=2){
            $valor=$this->pedido[$x];
            
            $total=$total+$valor->preco*$this->pedido[$x-1];
            echo"seu total e $total";
        }
    }
    public function detalhes(){
        echo"$this->cliente";
        for ($x=0; $x<sizeof($this->pedido);$x++){
            $sim=$this->pedido;
            echo"$sim";
            $valor=$this->pedido[$x];
            $valor->preco;
            echo"$valor";
        
        }

    }
}
$pedido1= new Pedido("luis");
$pedido1->adicionarItem($maca,10);
$pedido1->total();
$pedido1->detalhes();

?>
    
