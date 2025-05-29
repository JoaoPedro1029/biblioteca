<?php
// Conexão com o banco de dados
include ('../../config.php'); // Inclua seu arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aluno_id = $_POST['aluno_id'];
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
        $query_emprestimo = "INSERT INTO emprestimos (aluno_id, livro_id, data_retirada, data_devolucao) VALUES (:aluno_id, :livro_id, :data_retirada, :data_devolucao)";
        $stmt_emprestimo = $conn->prepare($query_emprestimo);
        
        if ($stmt_emprestimo === false) {
            die("Erro na preparação da inserção: " . implode(", ", $conn->errorInfo()));
        }
        
        // Vincular os parâmetros
        $stmt_emprestimo->bindValue(':aluno_id', $aluno_id, PDO::PARAM_INT);
        $stmt_emprestimo->bindValue(':livro_id', $livro_id, PDO::PARAM_INT);
        $stmt_emprestimo->bindValue(':data_retirada', $data_retirada, PDO::PARAM_STR);
        $stmt_emprestimo->bindValue(':data_devolucao', $data_devolucao, PDO::PARAM_STR);
        
        if ($stmt_emprestimo->execute()) {
            echo "Empréstimo criado com sucesso!";
        } else {
            echo "Erro ao criar empréstimo: " . implode(", ", $stmt_emprestimo->errorInfo());
        }
        
        // Liberar a declaração
        $stmt_emprestimo = null;
        
        // Não é necessário fechar a declaração com PDO
        // Fechar a conexão
        $conn = null; // Fechando a conexão
        } else {
            echo "Livro não encontrado"; // Corrigido: ponto e vírgula adicionado
        }
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Método de requisição inválido.";
        }
        ?>