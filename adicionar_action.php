<?php 
require 'config.php';

// input post pois o tipo de envio é post
// campo name
$name = filter_input(INPUT_POST, 'name');

// FILTER VALIDATE EMAIL = VALIDAR O EMAIL
$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);

// VERIFICA SE TEM DADOS VALIDOS 
// senão ele volta ao arquivo adicionar.php
if($name && $email){

    // verifica se ja tem o o email
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email',$email);
    $sql->execute();

    // se a busca não encontrou registro com o mesmo email 
    if($sql->rowCount() === 0){

        $sql = $pdo->prepare("INSERT INTO usuarios (nome,email)values (:name,:email) ");
        // transformar :name na variavel $name e trata questoes de segurança
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
    
        // executa a query
        $sql->execute();
    
        // volta ao inicio
        header('location:index.php');
        exit;
    }
    // se tiver registro com o mesmo email, retorna para o arquivo adicionar.php
    else{
        header('location: adicionar.php');
        exit;
    }
}
else{
    header('location: adicionar.php');
    exit;
}