<?php

// Função para deletar um professor
function deleteProfessor($id) {
    // Torna a variável $conn acessível dentro da função
    global $conn;
    // Monta a consulta SQL para deletar um professor com base no ID fornecido
    $sql = "DELETE FROM professores WHERE id=$id";
    // Executa a consulta e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Retorna mensagem de sucesso se a exclusão ocorreu sem problemas
        return "Professor deletado com sucesso.";
    } else {
        // Retorna mensagem de erro se houver algum problema na execução da consulta
        return "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>
