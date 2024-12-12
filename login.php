<?php
// A variável que armazena o nome de usuário e senha válidos
$usuario_valido = 'admin';
$senha_valida = '1234'; 

// Mensagem para exibir caso o login falhe
$mensagem = '';

// Verifica se o método de requisição é POST (significa que o formulário foi enviado)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera o nome de usuário e a senha enviados no formulário
    $usuario = $_POST['username'];
    $senha = $_POST['password'];

    // Verifica se o nome de usuário e a senha são válidos
    if ($usuario == $usuario_valido && $senha == $senha_valida) {
        // Se estiver correto, redireciona para a página principal (index.php)
        header("Location: index.php");
        exit;
    } else {
        // Caso contrário, define a mensagem de erro
        $mensagem = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Define a codificação de caracteres para UTF-8, para garantir que os caracteres especiais sejam exibidos corretamente -->
    <meta charset="UTF-8">
    
    <!-- Tornar a página responsiva em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Título que será exibido na aba do navegador -->
    <title>Academia Gym Fit </title>
    
    <!-- Link para o arquivo CSS do Bootstrap para estilização dos componentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Estilo de fundo da página com uma imagem relacionada a uma academia */
        body {
            background-image: url('https://www.embraplan.com.br/imagens/noticias/11b986fc-d5a6-49a8-ba84-7cbbe8b6f93e.jpg');
            background-size: cover; /* A imagem vai cobrir toda a área da tela */
            background-position: center; /* A imagem será centralizada */
        }
        
        /* Estilo do contêiner onde o formulário ficará posicionado */
        .container {
            max-width: 400px; /* Largura máxima do contêiner */
            margin-top: 50px; /* Espaçamento superior */
            padding: 20px; /* Preenchimento interno */
            background-color: rgba(255, 255, 255, 0.8); /* Cor de fundo com opacidade para deixar o fundo visível, mas suave */
            border: 1px solid #ddd; /* Borda leve */
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave ao redor do contêiner */
        }
        
        /* Estilo para os campos de entrada (input) */
        .form-control {
            border-radius: 10px; /* Bordas arredondadas nos campos de entrada */
        }
        
        /* Estilo para o botão de envio (Entrar) */
        .btn-primary {
            border-radius: 10px; /* Bordas arredondadas */
            background-color: #2ecc71; /* Cor de fundo verde */
            border: none; /* Remove a borda padrão */
        }

        /* Estilo para o botão quando o usuário passar o mouse (hover) sobre ele */
        .btn-primary:hover {
            background-color: #27ae60; /* Cor mais escura quando o botão é pressionado */
        }

        /* Estilo para a mensagem de erro (caso o login falhe) */
        .alert-danger {
            background-color: #e74c3c; /* Cor de fundo vermelha */
            border: none; /* Remove borda */
            border-radius: 10px; /* Bordas arredondadas */
        }
    </style>
</head>
<body class="container">
    <!-- Título da página "Login", com uma cor verde -->
    <h1 class="text-center mt-5" style="color: #2ecc71;">Login</h1>
    
    <!-- Verifica se a variável $mensagem foi definida (indica erro de login), e exibe a mensagem -->
    <?php if ($mensagem): ?>
        <div class="alert alert-danger text-center"><?= $mensagem ?></div>
    <?php endif; ?>

    <!-- Formulário de login (método POST), que envia os dados para o próprio script -->
    <form method="POST" class="mt-3">
        <!-- Campo para o nome de usuário -->
        <div class="mb-3">
            <label for="username" class="form-label" style="color: #2ecc71;">Usuário</label>
            <input type="text" class="form-control" id="username" name="username" required> <!-- Campo obrigatório -->
        </div>
        
        <!-- Campo para a senha -->
        <div class="mb-3">
            <label for="password" class="form-label" style="color: #2ecc71;">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required> <!-- Campo obrigatório -->
        </div>
        
        <!-- Botão de login -->
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</body>
</html>
