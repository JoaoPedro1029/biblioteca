<?php

include '../../config.php';


// Função para ler todos os alunos
function readAlunos() {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Executa a consulta SQL para selecionar todos os registros da tabela 'aluno'
    $stmt = $pdo->query("SELECT * FROM alunos");
    // Retorna todos os registros resultantes da consulta como um array associativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
