<?php
// Função para ler todos os empréstimos
function readEmprestimos() {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Executa a consulta SQL para selecionar todos os registros da tabela 'emprestimo'
    $stmt = $pdo->query("SELECT * FROM emprestimos");
    // Retorna todos os registros resultantes da consulta como um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
