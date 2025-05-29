<?php
// Função para deletar um livro
function deleteLivro($id) {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Prepara a consulta SQL para deletar um registro na tabela 'livro' com base no ID fornecido
    $stmt = $pdo->prepare("DELETE FROM livro WHERE id = ?");
    // Executa a consulta com o valor fornecido
    $stmt->execute([$id]);
}
?>
