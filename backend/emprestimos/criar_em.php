<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar Empréstimo</title>
    <link rel="stylesheet" href="../../frontend/css/styles.css" />
</head>
<body>
<?php
// Conexão com o banco de dados
include ('../../config.php'); // Inclua seu arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aluno_id = $_POST['aluno_nome'];
    $professor_id = $_SESSION['id'];
    $livro_nome = $_POST['livro_id']; // Supondo que você está passando o nome do livro
    $data_retirada = $_POST['data_retirada'];
    $data_devolucao = $_POST['data_devolucao'];
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
    var_dump($aluno_id);
    // Vincular os parâmetros
    $stmt_emprestimo->bindValue(':aluno_id', $aluno_id, PDO::PARAM_INT);
    $stmt_emprestimo->bindValue(':professor_id', $professor_id, PDO::PARAM_STR);
    $stmt_emprestimo->bindValue(':livro_id', $livro_id, PDO::PARAM_INT);
    $stmt_emprestimo->bindValue(':data_retirada', $data_retirada, PDO::PARAM_STR);
    $stmt_emprestimo->bindValue(':data_devolucao', $data_devolucao, PDO::PARAM_STR);

   

    if ($stmt_emprestimo->execute()) {
        echo "<div class='form-container'>Empréstimo criado com sucesso!</div>";
    } else {
        echo "<div class='form-container'>Erro ao criar empréstimo: " . implode(", ", $stmt_emprestimo->errorInfo()) . "</div>";
    }
 

    // Liberar a declaração
    $stmt_emprestimo = null;
    
    // Fechar a conexão
    $conn = null;
} else {
    echo "<div class='form-container'>Livro não encontrado</div>";
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<div class='form-container'>Método de requisição inválido.</div>";
}
?>
</body>
</html>
