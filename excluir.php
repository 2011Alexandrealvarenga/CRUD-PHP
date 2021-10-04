<?php 
require 'config.php';

$id = filter_input(INPUT_GET, 'id');
if($id){

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(':id' , $id);
    $sql->execute();

}
    // se não tiver dados, ele vai para index
    header('location:index.php');
    exit;
;?>
