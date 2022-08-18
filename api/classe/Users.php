<?php 

    class Ususario 
    {
        public $nome;
        public $senha;
        public $token;

        function __construct($nome, $senha) {
            include('../includes/conexao_mysqli.php');
            $this->nome = $nome;
            $this->senha = $senha;
            $this->mysqli  = $mysqli;
        }


        public function index(){
            $sql = "SELECT id, nome FROM users";
            $resultado = mysqli_stat($this->mysqli, $sql);

            var_dump($resultado);
        }
    }
    