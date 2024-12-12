<?php  
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o ID do instrutor foi passado via GET na URL
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Prepara a consulta SQL para selecionar o instrutor com o ID específico
    $sql = "SELECT * FROM instrutores WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    // Executa a consulta SQL passando o ID como parâmetro
    $stmt->execute([':id' => $id]);
    
    // Obtém o instrutor como um array associativo
    $instrutor = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o instrutor foi encontrado, caso contrário, exibe uma mensagem e encerra a execução
    if(!$instrutor){
        echo "Instrutor não encontrado";
        exit;  // Encerra o script se o instrutor não for encontrado
    }
}

// Verifica se o formulário foi enviado via método POST (quando o botão "Atualizar" for clicado)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $especialidade = $_POST['especialidade'];

    // Prepara a consulta SQL para atualizar os dados do instrutor
    $sql = "UPDATE instrutores SET nome = :nome, telefone = :telefone, email = :email, endereco = :endereco, especialidade = :especialidade WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Executa a consulta, passando os valores do formulário e o ID do instrutor
    $stmt->execute([
        ":nome" => $nome,
        ":telefone" => $telefone,
        ":email" => $email,
        ":endereco" => $endereco,
        ":especialidade" => $especialidade,
        ":id" => $id
    ]);

    // Exibe uma mensagem de sucesso ao atualizar o instrutor
    echo "Instrutor atualizado com sucesso";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Definindo o charset e as configurações para dispositivos móveis -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Título da página -->
    <title>Editar Instrutor</title>
    
    <!-- Inclusão do CSS do Bootstrap para estilização -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Estilo para o fundo da página */
        body {
            background-color: #f0f0f0;
        }

        /* Estilo para o contêiner onde o formulário será exibido */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para os campos de input */
        .form-control {
            margin-bottom: 20px;
        }

        /* Margem para os botões */
        .btn {
            margin: 10px;
        }
    </style>
</head>
<body>
    <!-- Container principal -->
    <div class="container">
        <!-- Título do formulário -->
        <h1 class="text-center mb-4">Editar Instrutor</h1>
        
        <!-- Formulário para edição do instrutor -->
        <form method="POST" class="mt-3">
            
            <!-- Campo para o nome do instrutor -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Instrutor</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $instrutor['nome'] ?>" required>
            </div>
            
            <!-- Campo para o telefone do instrutor -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $instrutor['telefone'] ?>" required>
            </div>
            
            <!-- Campo para o e-mail do instrutor -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $instrutor['email'] ?>" required>
            </div>
            
            <!-- Campo para o endereço do instrutor -->
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $instrutor['endereco'] ?>" required>
            </div>
            
            <!-- Campo para a especialidade do instrutor -->
            <div class="mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input type="text" class="form-control" id="especialidade" name="especialidade" value="<?= $instrutor['especialidade'] ?>" required>
            </div>
            
            <!-- Botão de submissão para atualizar os dados do instrutor -->
            <button type="submit" class="btn btn-primary">Atualizar</button>
            
            <!-- Botão para voltar à lista de instrutores -->
            <a href="listar_instrutores.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>
