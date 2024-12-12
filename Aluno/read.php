<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Realiza a consulta no banco de dados para buscar todos os alunos
$sql = "SELECT * FROM alunos";
$result = $pdo->query($sql);

// Armazena todos os alunos retornados pela consulta em um array associativo
$alunos = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Alunos</title>
    <!-- Inclusão do CSS do Bootstrap para estilização da página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inclusão do CSS para os ícones do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        /* Estilos para o corpo da página */
        body {
            background-color: #f0f0f0; /* Cor de fundo */
        }

        /* Estilo da container principal */
        .container {
            max-width: 800px; /* Largura máxima */
            margin: 40px auto; /* Centraliza a container */
            padding: 20px; /* Preenchimento interno */
            background-color: #fff; /* Fundo branco */
            border: 1px solid #ddd; /* Borda sutil */
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        /* Estilo da tabela */
        .table {
            margin-bottom: 20px; /* Margem inferior */
        }

        /* Estilo das células da tabela */
        .table th, .table td {
            vertical-align: middle; /* Alinha verticalmente o conteúdo */
        }

        /* Estilo dos botões */
        .btn {
            margin: 5px; /* Espaçamento entre os botões */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Título da página -->
        <h1 class="text-center mb-4">Listagem de Alunos</h1>

        <!-- Tabela para exibição dos alunos -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- Cabeçalho da tabela -->
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Plano</th>
                    <th>Ações</th> <!-- Coluna de ações (Editar/Excluir) -->
                </tr>
            </thead>
            <tbody>
              
