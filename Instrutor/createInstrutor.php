<?php 
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o formulário foi submetido (botão "cadastrar" pressionado)
if (isset($_POST['cadastrar'])) {
    // Recebe os dados do formulário via POST
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $carga_horaria = $_POST['carga_horaria'];
    $salario = $_POST['salario'];

    // Define a consulta SQL para inserir os dados do instrutor no banco
    $sql = "INSERT INTO instrutores (nome, telefone, email, endereco, carga_horaria, salario) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Prepara a consulta SQL com a conexão PDO
    $stmt = $pdo->prepare($sql);
    
    // Executa a consulta, passando os dados recebidos do formulário
    $stmt->execute([$nome, $telefone, $email, $endereco, $carga_horaria, $salario]);

    // Verifica se a inserção foi bem-sucedida (se uma linha foi afetada)
    if ($stmt->rowCount() > 0) {
        // Exibe uma mensagem de sucesso e redireciona o usuário para a página de listagem de instrutores
        echo "<script>alert('Instrutor cadastrado com sucesso!');</script>";
        echo "<script>window.location.href='listar_instrutores.php';</script>";
    } else {
        // Caso contrário, exibe uma mensagem de erro
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
    <!-- Inclui o CSS do Bootstrap para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para o fundo da página */
        body {
            background-image: url('https://p2.trrsf.com/image/fget/cf/774/0/images.terra.com/2024/07/04/1275438437-academia.jpg');
            background-size: cover; /* Faz o fundo cobrir toda a tela */
            background-position: center; /* Centraliza o fundo */
            color: black; /* Cor do texto do corpo agora em preto */
        }
        
        /* Estilos da container de conteúdo */
        .container {
            max-width: 800px; /* Define a largura máxima da container */
            margin-top: 50px; /* Espaçamento no topo */
            padding: 20px; /* Espaçamento interno */
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco com opacidade */
            border: 1px solid #ddd; /* Borda sutil */
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        /* Estilos para os botões */
        .btn {
            margin: 10px; /* Espaçamento entre os botões */
        }

        /* Estilo das labels */
        .form-label {
            color: black; /* Cor das labels em preto */
        }

        /* Estilo dos inputs de texto e selects */
        .form-control, .form-select {
            background-color: #ffffff; /* Cor de fundo branca para os inputs */
            color: black; /* Cor do texto em preto */
        }

        /* Estilos das mensagens de sucesso */
        .alert-success {
            color: black; /* Cor das mensagens de sucesso em preto */
        }
    </style>
</head>
<body>
    <!-- Início da container onde o formulário estará -->
    <div class="container">
        <h1 class="text-center mb-4">Cadastrar Instrutor</h1> <!-- Título da página -->
        
        <!-- Formulário para cadastro do instrutor -->
        <form method="post">
            <!-- Campo para nome do instrutor -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required> <!-- Campo de texto para nome -->
            </div>

            <!-- Campo para telefone do instrutor -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required> <!-- Campo de texto para telefone -->
            </div>

            <!-- Campo para e-mail do instrutor -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" required> <!-- Campo de texto para e-mail -->
            </div>

            <!-- Campo para o endereço do instrutor -->
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:</label>
                <input type="text" id="endereco" name="endereco" class="form-control" required> <!-- Campo de texto para endereço -->
            </div>

            <!-- Campo para a carga horária do instrutor -->
            <div class="mb-3">
                <label for="carga_horaria" class="form-label">Carga Horária:</label>
                <input type="number" id="carga_horaria" name="carga_horaria" class="form-control" required> <!-- Campo numérico para carga horária -->
            </div>

            <!-- Campo para o salário do instrutor -->
            <div class="mb-3">
                <label for="salario" class="form-label">Salário:</label>
                <input type="number" id="salario" name="salario" class="form-control" required> <!-- Campo numérico para salário -->
            </div>

            <!-- Botão para enviar o formulário -->
            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button> <!-- Botão de envio -->
            
            <!-- Link para voltar à listagem de instrutores -->
            <a href="listar_instrutores.php" class="btn btn-secondary">Voltar</a> <!-- Botão de voltar -->
        </form>
    </div>
</body>
</html>
