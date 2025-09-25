<?php
class  Pessoa{
    public  ?int $id=null;
    public $nome;
    public $telefone;
    public $endereco;
    public function __construct($nome, $telefone, $endereco,?int $id=null){
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->id = $id;
    }
    public function toarray(){
        return[
        "nome"=>$this->nome,
        "telefone"=>$this->telefone,
        "endereco"=>$this->endereco
        ];
    }
}
class pessoafisica extends pessoa{
    public $cpf;
    public function __construct( $nome, $telefone, $endereco, $cpf, ?int $id=null){
        parent::__construct($nome, $telefone, $endereco,$id);
        $this->cpf = $cpf;
    }
}
class pessoajuridica extends pessoa{
    public $cnpj;
    public array $socios = [];
    public function __construct($nome, $telefone, $endereco, $cnpj, ?int $id=null){
        parent::__construct($nome, $telefone, $endereco,$id);
        $this->cnpj=$cnpj;
    }
    public function adicionar(pessoafisica $socio){
        array_push( $this->socios, $socio);
    }

}



$pf1 = new pessoafisica("joao", "666666666", "rua a","757567854");
$pf2 = new pessoafisica("maria","4546636", "rua b","53537333");
$pj = new pessoajuridica("tech", "76967967096", "rua c", "344227732");
$pj->adicionar($pf1);
$pj->adicionar($pf2);
var_dump($pf1);
echo "br";
echo "br";
var_dump($pf2);
echo "br";
echo "br";
var_dump($pj);
echo "br";
echo "br";