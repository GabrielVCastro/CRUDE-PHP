<?php

include('../includes/conexao.php');

$sql = "SELECT id, nome FROM users";
$stmt = $PDO->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);	

if ($resultado) {
    echo json_encode($resultado);
}else{
	echo 'false';
}

