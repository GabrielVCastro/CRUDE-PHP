<?php

class Ususario
{       
    public $conx;

    function __construct()
    {
        $this->conx = $this->connection();
    }

    public function listar()
    {
        $sql = "SELECT id, nome FROM users";
        $stmt = $this->conx->prepare($sql);
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
        $stmt = $this->conx->prepare($sql);
        $stmt->bindParam('nome', $usuario);
        $stmt->bindParam('senha', $password);

        if ($stmt->execute()) {
            echo 'Salvo com sucesso';
        }else{
            echo 'Algo deu errado';
        }
    }


    public function deletar($id){
        
        $sql = "DELETE FROM users WHERE id = :id";

        $stmt = $this->conx->prepare($sql);
        $stmt->bindParam(":id", $id);
        
        if ($stmt->execute()) {
            echo  'sucesso';
        }else{
            echo false;
        }
            
    }

    public function editar($id, $nome,$senha){
    
        $usuario = $nome;	
        $password = $senha;

        if(!$usuario){
            echo 'Usuário invalido 2';
            exit;
        }
        if($password==''){
            $sql = "UPDATE users SET nome = :nome  WHERE id = :id ";

        }else{
            $sql = "UPDATE users SET nome = :nome, senha = :senha WHERE id = :id ";
        }

        $stmt = $this->conx->prepare($sql);
        $stmt->bindParam(':nome', $usuario);

        if($password!==''){
            $stmt->bindParam(':senha', $password);
        }

        $stmt->bindParam(':id',$id);

        if ($stmt->execute()) {
            return true;
        }else{
            return false;
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
