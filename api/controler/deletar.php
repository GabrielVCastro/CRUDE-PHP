<?php
include('../includes/conexao.php');
$id = $_POST['id'];
$sql = "DELETE FROM users WHERE id = :id";

$stmt = $PDO->prepare($sql);
$stmt->bindParam(":id", $id);

if ($stmt->execute()) {
    echo  'sucesso';
}else{
    echo false;
}

