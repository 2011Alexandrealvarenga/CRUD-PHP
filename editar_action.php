<?php 
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
// input post pois o tipo de envio é post
// campo name
$name = filter_input(INPUT_POST, 'name');

// FILTER VALIDATE EMAIL = VALIDAR O EMAIL
$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);

// VERIFICA SE TEM DADOS VALIDOS 
// senão ele volta ao arquivo adicionar.php
if($id && $name && $email){
    // atualiza os valores
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email= :email WHERE id = :id");
    $sql->bindValue(':name',$name);
    $sql->bindValue(':email',$email);
    $sql->bindValue(':id',$id);
    $sql->execute();

    header("Location: index.php");
    exit;

}
else{
    header('location: adicionar.php');
    exit;
}