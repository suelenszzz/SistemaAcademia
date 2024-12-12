<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o parâmetro 'id' foi passado na URL
if(isset($_GET['id'])){
    // Recebe o id do aluno a ser editado
    $id = $_GET['id'];

    // Consulta no banco de dados o aluno com o id especificado
    $sql = "SELECT * FROM alunos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    // Obtém os dados do aluno
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o aluno existe
    if(!$aluno){
        echo "Aluno não encontrado"; // Caso não encontre o aluno, exibe mensagem e encerra o script
        exit;
    }
}

// Verifica se o formulário foi submetido via método POST (quando o usuário envia os dados para atualizar o aluno)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $plano = $_POST['plano'];

    // Prepara a consulta SQL para atualizar os dados do aluno no banco de dados
    $sql = "UPDATE alunos SET nome = :nome, telefone = :telefone, email = :email, endereco = :endereco, plano = :plano WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Executa a consulta passando os dados para atualizar
    $stmt->execute([
        ":nome" => $nome,
        ":telefone" => $telefone,
        ":email" => $email,
        ":endereco" => $endereco,
        ":plano" => $plano,
        ":id" => $id // Passa o id para garantir que estamos atualizando o aluno correto
    ]);

    // Exibe mensagem de sucesso após a atualização
    echo "Aluno atualizado com sucesso";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <!-- Inclusão do CSS do Bootstrap para estilização da página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        /* Estilo dos campos de formulário */
        .form-control {
            margin-bottom: 20px; /* Espaçamento inferior entre os campos */
        }
        /* Estilo dos botões */
        .btn {
            margin: 10px; /* Margem entre os botões */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Título da página -->
        <h1 class="text-center mb-4">Editar Aluno</h1>

        <!-- Formulário para edição dos dados do aluno -->
        <form method="POST" class="mt-3">
            <!-- Campo de entrada para o nome do aluno -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Aluno</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno['nome'] ?>" required>
            </div>

            <!-- Campo de entrada para o telefone -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $aluno['telefone'] ?>" required>
            </div>

            <!-- Campo de entrada para o e-mail -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $aluno['email'] ?>" required>
            </div>

            <!-- Campo de entrada para o endereço -->
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno['endereco'] ?>" required>
            </div>

            <!-- Campo de entrada para o plano do aluno -->
            <div class="mb-3">
                <label for="plano" class="form-label">Plano</label>
                <input type="text" class="form-control" id="plano" name="plano" value="<?= $aluno['plano'] ?>" required>
            </div>

            <!-- Botão para enviar o formulário -->
            <button type="submit" class="btn btn-primary">Atualizar</button>

            <!-- Link para voltar à página de listagem de alunos -->
            <a href="Aluno/read.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>
