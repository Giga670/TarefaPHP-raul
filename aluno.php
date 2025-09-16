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

class Turma{
    public $diciplina;
    public $alunos=[];
    public $media;
    public $melhor;
    public $ap;
    public $al;

    public function __construct($diciplina) {
        $this->diciplina = $diciplina;
    }

    public function adicionaraluno(Aluno $aluno ){
            array_push($this->alunos, $aluno);
    }
    public function melhoraluno() {
         $media=0;
         for ($x=0; $x<sizeof($this->alunos); $x++) { 
            
            if ($this->alunos[$x]->media()>$media){
                $media=$this->alunos[$x]->media();
                $melhor=$this->alunos[$x];
            }
         }
          echo"o melhor aluno foi $melhor com nota de $media";  
    }
    public function resultadofinal(){
        for ($x=0; $x<sizeof($this->alunos); $x++) { 
            $ap=$this->alunos[$x]->aprovado();
            $al=$this->alunos[$x];
            echo"o aluno $al foi $ap";
         }
    }
}
$aula=new Turma("mat");
$aula->adicionaraluno($luis);
$aula->melhoraluno();
$aula->resultadofinal();
































?>