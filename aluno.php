<?php

class Aluno {

    public $nome;
    public int $matricula;
    public $notas= [];

    public $midia;

    public function __construct($matricula,$nome,) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        
    }

    public function adicionarnota(float $nota){
          array_push( $this->notas, $nota);  
    }

    public function media(){
        for ($x=0; $x<=sizeof($this->notas);$x++){
            $this->midia=$this->midia+$this->notas[$x];
        }
        $this->midia=$this->midia/sizeof($this->notas);
        echo("sua media: $this->midia");
    }

    public function aprovado(){
            if($this->midia>=6){
                echo "voce foi aprovado";
                return true;
            }
            else{
                echo "voce foi reprovado";
                return false;
            }

    }
    
}
$luis = new Aluno(111,"arthur");
$luis-> adicionarnota(10,);
$luis-> adicionarnota(10,);
$luis-> adicionarnota(10,);
$luis-> media();
$luis->aprovado();

































?>