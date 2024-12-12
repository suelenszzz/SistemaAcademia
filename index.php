<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Definindo a codificação de caracteres para UTF-8 -->
    <meta charset="UTF-8">

    <!-- Tornando a página responsiva para diferentes tamanhos de tela (principalmente para dispositivos móveis) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título da página exibido na aba do navegador -->
    <title>Academia Gym Fit</title>

    <!-- Inclusão do CSS do Bootstrap a partir de um CDN para estilização de componentes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Estilo para o corpo da página */
        body {
            /* Definindo uma imagem de fundo que será carregada da URL fornecida */
            background-image: url('https://media.istockphoto.com/id/1322158059/pt/foto/dumbbell-water-bottle-towel-on-the-bench-in-the-gym.jpg?s=612x612&w=0&k=20&c=eFfg0ECbiSopufODZ0Kz6yKTXvay0pXQpwJaUXxpBoc=');
            /* Ajustando a imagem de fundo para cobrir toda a tela */
            background-size: cover;
            /* Centralizando a imagem de fundo na tela */
            background-position: center;
        }

        /* Estilo para o container que contém o conteúdo principal da página */
        .container {
            /* Definindo uma largura máxima de 800px */
            max-width: 800px;
            /* Margin-top para dar espaço do topo da página */
            margin-top: 50px;
            /* Adicionando um pouco de preenchimento */
            padding: 20px;
            /* Definindo a cor de fundo com opacidade para dar um efeito translúcido */
            background-color: rgba(255, 255, 255, 0.8);
            /* Definindo uma borda leve para o container */
            border: 1px solid #ddd;
            /* Bordas arredondadas */
            border-radius: 10px;
            /* Sombramento leve para o container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para os botões (margem) */
        .btn {
            /* Espaçamento entre os botões */
            margin: 10px;
        }
    </style>
</head>

<body class="container">
    <!-- Título centralizado da página -->
    <h1 class="text-center mt-5" style="color: #ffffff;">Bem-vindo à nossa academia</h1><br>

    <!-- Definindo um contêiner flexível para centralizar os botões -->
    <div class="d-flex justify-content-center">
        <!-- Botão para redirecionar para a página de cadastro de instrutor -->
        <a href="Instrutor/createInstrutor.php" class="btn btn-primary">Cadastrar Instrutor</a>
        
        <!-- Botão para redirecionar para a página que lista os instrutores -->
        <a href="Instrutor/readInstrutor.php" class="btn btn-secondary">Listar Instrutor</a>
        
        <!-- Botão para redirecionar para a página de cadastro de aluno -->
        <a href="Aluno/create.php" class="btn btn-primary">Cadastrar Aluno</a>
        
        <!-- Botão para redirecionar para a página que lista os alunos -->
        <a href="Aluno/read.php" class="btn btn-secondary">Listar Aluno</a>
    </div>
</body>
</html>
