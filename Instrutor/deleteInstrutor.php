<?php 
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o parâmetro 'id' foi passado via GET (isso indica que a exclusão é para um instrutor específico)
if(isset($_GET['id'])){
    // Captura o id do instrutor a ser excluído
    $id = $_GET['id'];

    // Define a consulta SQL para deletar o instrutor com o id especificado
    $sql = "DELETE FROM instrutores WHERE id = :id";

    // Prepara a consulta SQL com a conexão PDO
    $sql = $pdo->prepare($sql);

    // Executa a consulta passando o id como parâmetro
    $sql->execute([':id' => $id]);

    // Exibe uma mensagem indicando que o instrutor foi deletado
    echo "Instrutor deletado! ";
}
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Instrutor</title>
    <!-- Inclui o CSS do Bootstrap para estilização da página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br>
    <!-- Link de volta para a página de listagem de instrutores -->
    <a href="Instrutor/realInstrutor.php" class="btn btn-secondary mt-3">Voltar</a>
</body>
</html>
