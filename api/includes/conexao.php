<?php

try
{
    $PDO = new PDO( 'mysql:host=localhost' . ';dbname=' . 'teste', 'root', '' );
    return $PDO;
}
catch (PDOExeption $ex)
{
    // echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
?>