<?php

include '../../config.php';


// Função para atualizar um livro
function updateLivro($nome_livro, $nome_autor, $id) {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Prepara a consulta SQL para atualizar os dados do livro com base no ID fornecido
    $stmt = $pdo->prepare("UPDATE livro SET nome_livro = ?, nome_autor = ? WHERE id = ?");
    // Executa a consulta com os valores fornecidos
    $stmt->execute([$nome_livro, $nome_autor, $id]);
}
?>
