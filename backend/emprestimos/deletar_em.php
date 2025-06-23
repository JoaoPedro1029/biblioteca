<?php
// Função para deletar um empréstimo
function deleteEmprestimo($id) {
    // Torna a variável $pdo acessível dentro da função
    global $conn;
    // Prepara a consulta SQL para deletar um registro na tabela 'emprestimo' com base no ID fornecido
    $stmt = $conn->prepare("DELETE FROM emprestimos WHERE id = ?");
    // Executa a consulta com o valor fornecido
    $stmt->execute([$id]);
}
?>
