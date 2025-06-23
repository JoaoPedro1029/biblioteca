<?php
// Função para ler todos os empréstimos
function readEmprestimos() {
    // Torna a variável $conn acessível dentro da função
    global $conn;
    // Executa a consulta SQL para selecionar todos os registros da tabela 'emprestimos'
    $stmt = $conn->query("SELECT * FROM emprestimos");
    // Retorna todos os registros resultantes da consulta como um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
