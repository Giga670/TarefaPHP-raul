<?php

class biblioteca{
    public $nome;
    public $livros=[];
    public $livro;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function adicionarlivro($livro){
        array_push($this->livros, $livro);
    }
    public function buscarlivro(string $termo){
        
        for ($x=0; $x<sizeof($this->livros);$x++){
           if( $termo=$this->livros[$x]){
                $livro=$this->livros[$x];
                echo"$livro";
           }
            
        }
    }
    public function listarLivros(){
         for ($x=0; $x<sizeof($this->livros);$x++){
                $livro=$this->livros[$x];
                echo"$livro";
           }
    }
}

$teste= new biblioteca("babel");
$teste->adicionarlivro("cavaleiro");
$teste->adicionarlivro("cavalo");
$teste->adicionarlivro("espada");
$teste->buscarlivro("espada");
$teste->listarLivros();





























?>