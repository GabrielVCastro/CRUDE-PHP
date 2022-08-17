<?php

use Lcobucci\JWT\Signer\Ecdsa;

include('../includes/conexao.php');

if(!$_POST){
	var_dump($_POST);
	exit;
}
if($_POST["nome"]==null || $_POST["nome"]==''){
	echo 'Usuário invalido';
	exit;
}
if($_POST["senha"]==null || $_POST["senha"]==''){
	echo 'Password invalido';
	exit;
}

$usuario = $_POST["nome"];	
$password = $_POST["senha"];

if(!$usuario){
	echo 'Usuário invalido 2';
	exit;
}
if(!$password){
	echo 'Password invalido';
	exit;
}

$sql = "INSERT INTO users (nome, senha) VALUES (:nome, :senha)";

$stmt = $PDO->prepare($sql);
$stmt->bindParam('nome', $usuario);
$stmt->bindParam('senha', $password);

if ($stmt->execute()) {
	echo 'Salvo com sucesso';
}else{
	echo 'Algo deu errado';
}
?> 		


