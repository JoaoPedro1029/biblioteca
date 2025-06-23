<?php

include '../../config.php';

// Função para atualizar um professor
function updateProfessor($id, $nome, $cpf, $email, $senha) {
    global $conn;
    // Faz o hash da senha usando password_hash para maior segurança
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
    // Prepara a consulta SQL para evitar SQL injection
    $stmt = $conn->prepare("UPDATE professores SET nome = ?, cpf = ?, email = ?, senha = ? WHERE id = ?");
    if (!$stmt) {
        return "Erro na preparação da consulta: " . implode(" ", $conn->errorInfo());
    }
    // Executa a consulta com os parâmetros
    if ($stmt->execute([$nome, $cpf, $email, $senhaHash, $id])) {
        return "Professor atualizado com sucesso.";
    } else {
        $errorInfo = $stmt->errorInfo();
        return "Erro: " . $errorInfo[2];
    }
}
?>
