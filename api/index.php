<?php
    require_once "Usuario.class.php";
    
    header('Content-Type: application/json');
    $rota = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['REQUEST_URI'];
    $nome = $_REQUEST['nome'] ?? null;
    $senha = $_REQUEST['senha'] ?? null;

    $usuarios = new Ususario;
    if($rota == 'GET'){
        if($url == '/list'){
            $fullUsers = $usuarios->listar();
            if($fullUsers){
                return $fullUsers;
            }
            return false;
        }
    }
    if($rota == 'POST'){
        if(substr($url, 0, 7 ) == '/create'){
            $fullUsers = $usuarios->create($nome, $senha);
            if($fullUsers){
                return $fullUsers;
            }
            return false;
        }
    }



    echo 'Não existe esse parametro';