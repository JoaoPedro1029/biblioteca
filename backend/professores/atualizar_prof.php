<?php

include '../../config.php';

// Função para atualizar um professor
function updateProfessor($id, $nome, $cpf, $email, $senha) {
    // Torna a variável $conn acessível dentro da função
    global $conn;
    // Faz o hash da senha usando o algoritmo MD5 para aumentar a segurança
    $senhaHash = md5($senha);
    // Monta a consulta SQL para atualizar os dados do professor com base no ID fornecido
    $sql = "UPDATE professores SET nome='$nome', cpf='$cpf', email='$email', senha='$senhaHash' WHERE id=$id";
    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Retorna mensagem de sucesso se a atualização ocorreu sem problemas
        return "Professor atualizado com sucesso.";
    } else {
        // Retorna mensagem de erro se houver algum problema na execução da consulta
        return "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>
