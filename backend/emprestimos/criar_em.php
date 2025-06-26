<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar Empréstimo</title>
    <link rel="stylesheet" href="../../frontend/styles.css" />
</head>
<body>
<?php
// Conexão com o banco de dados
include ('../../config.php'); // Inclua seu arquivo de conexão
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aluno_id = isset($_POST['aluno_id']) ? $_POST['aluno_id'] : null;
    $professor_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    $livro_nome = isset($_POST['livro_id']) ? $_POST['livro_id'] : null; // Supondo que você está passando o nome do livro
    $data_retirada = isset($_POST['data_retirada']) ? $_POST['data_retirada'] : null;
    $data_devolucao = isset($_POST['data_devolucao']) ? $_POST['data_devolucao'] : null;

    // Validate required fields
    if (empty($aluno_id)) {
        die("<div class='container'>Erro: Aluno não selecionado. Por favor, selecione um aluno válido.</div>");
    }
    if (empty($professor_id)) {
        die("<div class='container'>Erro: Usuário não autenticado. Por favor, faça login.</div>");
    }
    if (empty($livro_nome)) {
        die("<div class='container'>Erro: Nome do livro não fornecido.</div>");
    }
    if (empty($data_retirada) || empty($data_devolucao)) {
        die("<div class='container'>Erro: Datas de retirada e devolução são obrigatórias.</div>");
    }
}
// Buscar ID do Livro
$query_livro = "SELECT id FROM livros WHERE nome_livro LIKE :livro_nome";
$stmt_livro = $conn->prepare($query_livro);
if ($stmt_livro === false) {
    die("Erro na preparação da consulta: " . $conn->errorInfo()[2]);
}
$livro_nome_param = $livro_nome . '%'; // Adicionando o wildcard
$stmt_livro->bindValue(':livro_nome', $livro_nome_param, PDO::PARAM_STR);
$stmt_livro->execute();
$result_livro = $stmt_livro->fetchAll(PDO::FETCH_ASSOC);

if (count($result_livro) > 0) {
    $livro_id = $result_livro[0]['id']; // Obter o ID do livro

    // Inserir o empréstimo no banco de dados
    $query_emprestimo = "INSERT INTO emprestimos (aluno_id, professor_id, livro_id, data_retirada, data_devolucao) VALUES (:aluno_id, :professor_id, :livro_id, :data_retirada, :data_devolucao)";
    $stmt_emprestimo = $conn->prepare($query_emprestimo);
    
    if ($stmt_emprestimo === false) {
        die("Erro na preparação da inserção: " . implode(", ", $conn->errorInfo()));
    }
    // Vincular os parâmetros
    $stmt_emprestimo->bindValue(':aluno_id', $aluno_id, PDO::PARAM_INT);
    $stmt_emprestimo->bindValue(':professor_id', $professor_id, PDO::PARAM_STR);
    $stmt_emprestimo->bindValue(':livro_id', $livro_id, PDO::PARAM_INT);
    $stmt_emprestimo->bindValue(':data_retirada', $data_retirada, PDO::PARAM_STR);
    $stmt_emprestimo->bindValue(':data_devolucao', $data_devolucao, PDO::PARAM_STR);

    if ($stmt_emprestimo->execute()) {
        echo "<script>
            alert('Empréstimo criado com sucesso!');
            window.location.href = '../../inicial.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Erro ao criar empréstimo: " . implode(", ", $stmt_emprestimo->errorInfo()) . "');
            window.history.back();
        </script>";
        exit;
    }

    // Liberar a declaração
    $stmt_emprestimo = null;
    
    // Fechar a conexão
    $conn = null;
} else {
    echo "<script>
        alert('Livro não encontrado');
        window.history.back();
    </script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<div class='container'>Método de requisição inválido.</div>";
}
?>
</body>
</html>
