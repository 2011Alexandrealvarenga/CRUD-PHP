<?php 
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');
if($id){
    // procurar o id
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");

    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        // se tem valores 
        $info = $sql->fetch( PDO::FETCH_ASSOC );
    } else {
        // se não achou valor, volta para index.php
        header("location: index.php");
        exit;
    }

}else{
    // se não tiver dados, ele vai para index
    header('location:index.php');
    exit;
}

;?>
<h1>Editar Usuario</h1>
<form method="post" action="editar_action.php">
    <input type="hidden" name="id" value="<?= $info['id']; ?>">
    <label for="">
        nome: <br/>
        <input type="text" name="name" value="<?= $info['nome']; ?>"/>
    </label><br/><br/>
    <label for="">
        email: <br/>
        <input type="email" name="email" value="<?= $info['email']; ?>"/>
    </label><br/><br/>
    <input type="submit" value="Salvar"/>
</form>