<?php
require "pessoas.php";
class Carro
{
    public $motor;
    public $torque;
    public $peso;
    public $espaco;
    public $velocidade;
    public Pessoa $proprietario;
    public function __construct($motor, $torque, $peso, $espaco){
        $this->motor = $motor;
        $this->torque = $torque;
        $this->peso = $peso;
        $this->espaco = $espaco;
    }
    public function ligar(){
        $this->velocidade = 20;
        echo "Carro ligado, velocidade atual $this->velocidade";
    }
    public function desligar(){
        $this->velocidade = 0;
        echo "Carro desligado!";
    }
    public function acelerar(){
        //aumentar a velocidade em 5;
        $this->velocidade += 5;
        echo "Acelerando, velocidade atual $this->velocidade";
    }
    public function desacelerar()
    {
        if($this->velocidade >= 5) {
            $this->velocidade -= 5;
            echo "Desacelerando, velocidade atual $this->velocidade";
        }
    }
}

class Utilitario extends Carro
{
    public $modoTurbo;
    public function __construct($motor, $torque, $peso, $espaco, $modoTurbo){
        parent::__construct($motor, $torque, $peso, $espaco);
        $this->modoTurbo = $modoTurbo;
    }
    public function modoEsportivo(){
        $this->velocidade += 5 * $this->modoTurbo;
        echo "Acelerando no turbo, velocidade atual $this->velocidade";
    }
}

class SUV extends Utilitario{
    public $assentos = 5;
}

$carro = new Carro("5","1","20","15");
$pf1 = new pessoafisica("raul","45688458","rua d","2462247");
$carro->proprietario = $pf1;
$suv = new SUV("5","10","20","15","2");
$suv->proprietario = new pessoajuridica("if","42647247","rua e","2526347");
$suv->proprietario->adicionar($pf1);


$onix = new Carro(1.0,0.7,950.9,560);
$onix->motor = 1.7;
echo "----------------<br>";
$onix->ligar();
echo "<br>";
$onix->acelerar();
echo "<br>";
$onix->acelerar();
echo "<br>";
$onix->desacelerar();
echo "<br>";
$onix->desligar();
echo "----------------<br>";

$hilux = new Utilitario(2.3,0.9,1180,1025,2.7);
echo "A capacidade máxima do modo turbo é: $hilux->modoTurbo <br><br>";
echo "<br>";
echo "----------------<br>";
$hilux->ligar();
echo "<br>";
$hilux->modoEsportivo();
echo "----------------<br>";


$sw4 = new SUV(3.4,2,1098,2000,2.7);
var_dump($sw4);
echo "<br><br>";
$sw4->assentos = 7;
var_dump($onix);

echo "<br>";
echo "<br>";
var_dump($hilux);
echo "<br>";
echo "<br>";
var_dump($sw4);
echo "<br>";
echo "<br>";
?>