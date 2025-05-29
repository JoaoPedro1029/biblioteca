<?php

include '../../config.php';


// Função para atualizar um aluno
function updateAluno($id, $nome, $serie, $email) {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;
    // Prepara a consulta SQL para atualizar os dados do aluno com base no ID fornecido
    $stmt = $pdo->prepare("UPDATE alunos SET nome = ?, serie = ?, email = ? WHERE id = ?");
    // Executa a consulta com os valores fornecidos
    $stmt->execute([$nome, $serie, $email, $id]);
}
?>
