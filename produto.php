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

?>
    
