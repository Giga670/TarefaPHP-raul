<?php
require_once"config.php";
require_once 'Pessoas.php';
class Database {
    private $conn;
    public function __construct(){
        try{
            //conexão ao mysql sem definir o banco
            $this->conn = new PDO (dsn:"mysql:host=".DB_HOST.";dbname=".DB_NAME, username: DB_USER, password: DB_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //criação do banco se não existir
            $this->conn->exec( "CREATE DATABASE IF NOT EXISTS " .DB_NAME);

            //conectar ao banco
            $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER,  DB_pass);

        } catch(PDOException $e){
            die('ERRO DE CONEXÃO: '.$e->getMessage());
        }
    }
    public function criartabela($comando){
        try{
            $sql= "CREATE TABLE IF NOT EXISTS $comando";
            $this->conn->exec($sql);
            echo "Tabela criada/verificada. <br>";
        } catch (PDOException $e) {
            echo"Erro ao criar tabela : ". $e->getMessage();
        }
    }
    public function inserir($tabela,$dados){
        try{
        $colunas = implode(",", array_keys($dados));
        $placeholder = ":" . implode(",:", array_keys($dados));
        $sql = "INSERT ignore INTO $tabela ($colunas) VALUES ($placeholder)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($dados);

        echo"dados inserios com sucesso<br>";
        } catch (PDOException $e) {
            die("erro ao inserir dados: " . $e->getMessage());
        }


    }
    
    public function buscarTodos($tabela) {
        $sql = "SELECT * FROM $tabela";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPessoas(){
        $sql = "select * from pessoas";
        $stmt = $this->conn->query($sql);
        $dados = $stmt->fetchAll(pdo::FETCH_ASSOC);
        foreach ($dados AS $dado){
            $pessoa = new Pessoa( $dado['nome'], $dado['telefone'], $dado['endereco'], $dado['id']);
            array_push($pessoas, $pessoa);
        }


    }
}
$db = new Database();
$db->criarTabela("pessoas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(100) UNIQUE NOT NULL,
    endereco VARCHAR(255) NOT NULL
)");
$pf1 = new Pessoa("João", "99999-1111", "Rua A, 123");
$pf2 = new Pessoa("Maria", "99999-2222", "Rua B, 456");
$db->inserir("pessoas", $pf1->toArray());
$db->inserir("pessoas", $pf2->toArray());


$db= new Database();
$db->criartabela("usuarios(id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL, email VARCHAR(100) UNIQUE NOT NULL)");
$db->inserir("usuarios",["nome"=>"Luís Arthur","email"=>"luisarthur0207@gmail.com"]);
$db->inserir("usuarios",["nome"=>"Arthur","email"=>"luisarthur020708@gmail.com"]);
$dados=$db->buscarTodos('pessoas');

?>