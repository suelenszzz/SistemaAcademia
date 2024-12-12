<?php
try {
    // Estabelece a conexão com o banco de dados
    $pdo = new PDO("mysql:dbname=sistema;host=localhost", "root", "");

    // Configurações para exibir erros (opcional, apenas para desenvolvimento)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Se a conexão for bem-sucedida
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Caso haja um erro na conexão, exibe a mensagem de erro
    echo "Erro de conexão: " . $e->getMessage();
}
?>
