<?php 
// Incluindo o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verificando se o formulário foi enviado (se o botão 'cadastrar' foi pressionado)
if (isset($_POST['cadastrar'])) {

    // Pegando os dados do formulário e armazenando em variáveis
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $carga_horaria = $_POST['carga_horaria'];
    $salario = $_POST['salario'];

    // Preparando a query SQL para inserir os dados na tabela 'instrutores'
    $sql = "INSERT INTO instrutores (nome, telefone, email, endereco, carga_horaria, salario) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    // Preparando a consulta para evitar injeção de SQL
    $stmt = $pdo->prepare($sql);
    
    // Executando a consulta e passando os dados do formulário como parâmetros
    $stmt->execute([$nome, $telefone, $email, $endereco, $carga_horaria, $salario]);

    // Verificando se o registro foi inserido com sucesso
    if ($stmt->rowCount() > 0) {
        // Caso a inserção tenha sido bem-sucedida, exibe uma mensagem de sucesso
        echo "<script>alert('Instrutor cadastrado com sucesso!');</script>";
        // Redireciona para a página de listagem de instrutores
        echo "<script>window.location.href='listar_instrutores.php';</script>";
    } else {
        // Caso haja um erro na inserção, exibe uma mensagem de erro
        echo "<script>alert('Erro ao cadastrar instrutor!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Instrutor</title>
    <!-- Inclusão do Bootstrap para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para a página */
        body {
            background-image: url('https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2024/07/04/1275438437-academia.jpg');
            background-size: cover; /* A imagem de fundo cobre toda a tela */
            background-position: center; /* A imagem está centralizada */
            color: black; /* Cor do texto no corpo agora em preto */
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco semi-transparente */
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave para o container */
        }
        .btn {
            margin: 10px; /* Espaçamento para os botões */
        }
        .form-label {
            color: black; /* Cor das labels em preto */
        }
        .form-control, .form-select {
            background-color: #ffffff; /* Fundo branco nos inputs */
            color: black; /* Texto preto nos inputs */
        }
        .alert-success {
            color: black; /* Texto da mensagem de sucesso em preto */
        }
    </style>
</head>
<body>
    <!-- Container centralizado para o formulário -->
    <div class="container">
        <h1 class="text-center mb-4">Cadastrar Instrutor</h1>
        <!-- Formulário que envia os dados via POST -->
        <form method="post">
            <!-- Campo para o nome do instrutor -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
  
