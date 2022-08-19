<?php

class Ususario
{
    public $nome;
    public $senha;
    public $token;


    public function listar()
    {
        $PDO = $this->connection();
       
        $sql = "SELECT id, nome FROM users";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);	

        if ($resultado) {
            echo json_encode($resultado);
        }else{
            echo 'false';
        }

    }

    public function create($nome, $senha)
    {

        $conx = $this->connection();

        if($nome==null || $nome==''){
            echo 'Usuário invalido';
            exit;
        }
        if($senha==null || $senha==''){
            echo 'Password invalido';
            exit;
        }

        $usuario = $nome;	
        $password = $senha;

        if(!$usuario){
            echo 'Usuário invalido 2';
            exit;
        }
        if(!$password){
            echo 'Password invalido';
            exit;
        }

        $sql = "INSERT INTO users (nome, senha) VALUES (:nome, :senha)";
        $stmt = $conx->prepare($sql);
        $stmt->bindParam('nome', $usuario);
        $stmt->bindParam('senha', $password);

        if ($stmt->execute()) {
            echo 'Salvo com sucesso';
        }else{
            echo 'Algo deu errado';
        }
    }

    private function connection()
    {
        try
        {
            $PDO = new PDO( 'mysql:host=localhost' . ';dbname=' . 'teste', 'root', '' );
            return $PDO;
        }
        catch (PDOExeption $ex)
        {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }
}
