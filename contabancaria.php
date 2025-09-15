<?php

class Contabancaria {

    public $titular;
    public $saldo;

    public function __construct($titular,$saldo){
        $this->titular;
        $this->saldo;
    }

    public function depositar(float $valor){
        $this->saldo= $this->saldo+$valor;
        echo"seu saldo $this->saldo";
    }

    public function sacar(float $valor){
        if($this->saldo>=$valor){
            $this->saldo=$this->saldo-$valor;
            echo"seu saldo $this->saldo";
        }
        else{
            echo"sem saldo";
        }
    }
    public function transferir(ContaBancaria $destino, float $valor){
        if($this->saldo>=$valor){
            $destino->$valor;
            $this->saldo=$this->saldo-$valor;
            echo"seu saldo $this->saldo";
        }
        else{
            echo"sem saldo";
        }
    }
}

$conta1 = new Contabancaria("luis",100);
$conta2 = new Contabancaria("luis",100);
$conta1->depositar(100);
$conta1->sacar(100);
$conta1->transferir($conta2,100);



































?>