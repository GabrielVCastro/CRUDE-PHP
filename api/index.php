<?php
    require_once "Usuario.class.php";
    
    header('Content-Type: application/json');
    $post = $_SERVER['REQUEST_METHOD'];
    $url = $_SERVER['REQUEST_URI'];
    $nome = $_REQUEST['nome'] ?? null;
    $senha = $_REQUEST['senha'] ?? null;

    $usuarios = new Ususario;
 
    if($url == '/list'){
        $fullUsers = $usuarios->listar();
        if($fullUsers){
            return $fullUsers;
        }
        return false;
    }
    if($post == 'POST'){
        if(substr($url, 0, 7 ) == '/create'){
            $fullUsers = $usuarios->create($nome, $senha);
            if($fullUsers){
                return $fullUsers;
            }
            return false;
        }
    }



    echo 'Não existe esse parametro';