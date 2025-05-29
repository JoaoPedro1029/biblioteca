<?php

include '../../config.php';


// Função para deletar um aluno
function deleteAluno($id) {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Prepara a consulta SQL para deletar um registro na tabela 'aluno' com base no ID fornecido
    $stmt = $pdo->prepare("DELETE FROM aluno WHERE id = ?");
    // Executa a consulta com o valor fornecido
    $stmt->execute([$id]);
}
?>
