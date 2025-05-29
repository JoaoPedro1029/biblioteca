<?php

include '../../config.php';


// Função para atualizar um empréstimo
function updateEmprestimo($id, $aluno_id, $professor_id, $livro_id, $data_retirada, $data_devolucao) {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Prepara a consulta SQL para atualizar os dados do empréstimo com base no ID fornecido
    $stmt = $pdo->prepare("UPDATE emprestimos SET aluno_id = ?, professor_id = ?, livro_id = ?, data_retirada = ?, data_devolucao = ? WHERE id = ?");
    // Executa a consulta com os valores fornecidos
    $stmt->execute([$aluno_id, $professor_id, $livro_id, $data_retirada, $data_devolucao, $id]);
}
?>
