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


$usuario = $_POST["nome"];	
$password = $_POST["senha"];
$id = $_POST["id"];

if(!$usuario){
	echo 'Usuário invalido 2';
	exit;
}
if($password==''){
    $sql = "UPDATE users SET nome = :nome  WHERE id = :id ";

}else{
    $sql = "UPDATE users SET nome = :nome, senha = :senha WHERE id = :id ";
}

$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $usuario);

if($password!==''){
    $stmt->bindParam(':senha', $password);
}

$stmt->bindParam(':id',$id);

if ($stmt->execute()) {
	echo true;
}else{
	echo false;
}