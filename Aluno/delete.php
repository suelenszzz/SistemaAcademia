<?php 
// Incluindo o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verificando se o ID do aluno foi passado pela URL (GET)
if(isset($_GET['id'])){
    // Pegando o ID do aluno da URL
    $id = $_GET['id'];

    // Preparando a consulta SQL para excluir o aluno baseado no ID
    $sql = "DELETE FROM alunos WHERE id = :id";

    // Preparando a execução da consulta com o PDO
    $sql = $pdo->prepare($sql);

    // Executando a consulta, passando o ID como parâmetro
    $sql->execute([':id' => $id]);

    // Exibindo uma mensagem informando que o aluno foi deletado
    echo "Aluno deletado com sucesso! ";
}
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Aluno</title>
    <!-- Inclusão do Bootstrap para estilização da página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br>
    <!-- Link para voltar à página de listagem de alunos -->
    <a href="Aluno/read.php" class="btn btn-secondary mt-3">Voltar</a>
</body>
</html>
