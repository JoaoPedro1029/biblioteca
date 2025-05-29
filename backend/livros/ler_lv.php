<?php
// Função para ler todos os livros
function readLivros() {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Executa a consulta SQL para selecionar todos os registros da tabela 'livro'
    $stmt = $pdo->query("SELECT * FROM livros");
    // Retorna todos os registros resultantes da consulta como um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
