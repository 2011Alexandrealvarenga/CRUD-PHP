<?php 
// busca as configurações do arquivo config.php
require 'config.php';

$lista = [];
// busca as informacoes no banco
$sql = $pdo->query("SELECT * FROM usuarios");

// verifica se tem linha na consulta
if($sql->rowCount() > 0 ){
    // joga a busca em $lista
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<a href="adicionar.php">Adicionar Usuarios</a>
<table border='1' width='100%'>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>ACOES</th>

    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <th><?php echo $usuario['id']; ?></th>
            <th><?php echo $usuario['nome']; ?></th>
            <th><?php echo $usuario['email']; ?></th>
            <th>
                <!-- editar de acordo com o ID -->
                <a href="editar.php?id=<?php echo $usuario['id']; ?>">[ Editar ]</a>
                <a href="excluir.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('tem certeza que deseja excluir?')">[ Excluir ]</a>
            </th>
        </tr>
    <?php endforeach; ?>
    
</table>
<!-- // consulta
// $sql = $pdo->query('select * from usuarios');

// conta quantas linhas tem no bd
// echo 'TOTAL:'.$sql->rowCount();

// fetchall - pega todos
// PDO::FETCH_ASSOC - constante estatica do PDO - NÃO GERA DUPLICIDADE
// $dados = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($dados); -->