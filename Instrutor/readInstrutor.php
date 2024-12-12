<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Executa uma consulta SQL para selecionar todos os instrutores da tabela "instrutores"
$sql = "SELECT * FROM instrutores";

// Usa o método query() do PDO para executar a consulta
$result = $pdo->query($sql);

// Recupera todos os resultados da consulta e os armazena em um array associativo
$instrutores = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Define o charset e a configuração de exibição para dispositivos móveis -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Listagem de Instrutores</title>
    <!-- Importa o CSS do Bootstrap para estilizar a página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Define a cor de fundo do corpo da página */
        body {
            background-color: #f0f0f0;
        }
        
        /* Define o estilo do contêiner centralizado onde a tabela será exibida */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        /* Define a margem inferior da tabela */
        .table {
            margin-bottom: 20px;
        }
        
        /* Define o alinhamento vertical do texto nas células da tabela */
        .table th, .table td {
            vertical-align: middle;
        }
        
        /* Adiciona uma margem aos botões */
        .btn {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Título da página -->
        <h1 class="text-center mb-4">Listagem de Instrutores</h1>
        
        <!-- Criação de uma tabela para exibir os dados dos instrutores -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- Cabeçalhos das colunas da tabela -->
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Carga Horária</th>
                    <th>Salário</th>
                    <th>Ações</th> <!-- Coluna para botões de ações (editar, excluir) -->
                </tr>
            </thead>
            <tbody>
                <!-- Loop para exibir todos os instrutores -->
                <?php foreach ($instrutores as $instrutor): ?>
                    <tr>
                        <!-- Exibe as informações de cada instrutor nas colunas -->
                        <td><?= $instrutor['nome'] ?></td>
                        <td><?= $instrutor['telefone'] ?></td>
                        <td><?= $instrutor['email'] ?></td>
                        <td><?= $instrutor['endereco'] ?></td>
                        <td><?= $instrutor['carga_horaria'] ?> horas</td>
                        <td>R$ <?= number_format($instrutor['salario'], 2, ',', '.') ?></td> <!-- Formata o salário para moeda -->
                        
                        <!-- Coluna para os botões de ação -->
                        <td>
                            <!-- Botão de editar, que redireciona para a página de edição do instrutor -->
                            <a href="editar_instrutor.php?id=<?= $instrutor['id']?>" class="btn btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i> <!-- Ícone de lápis para editar -->
                            </a>
                            
                            <!-- Botão de excluir, com confirmação de exclusão via JavaScript -->
                            <a href="deletar_instrutor.php?id=<?= $instrutor['id']?>" class="btn btn-danger" title="Excluir" onclick="return confirm('Tem certeza?')">
                                <i class="bi bi-trash"></i> <!-- Ícone de lixo para excluir -->
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Botão para voltar à página inicial -->
        <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</body>
</html>
