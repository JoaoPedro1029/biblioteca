<?php
// session_start();

// Inclui o arquivo de configuração do banco de dados
include '../../config.php';
include './cadastrarlivros.php';

// Obtém os dados do formulário
$title =  $_SESSION['title'];
$authors = $_SESSION['author'];
$isbn = $_SESSION['isbn'];
// var_dump($title, $authors, $isbn);
// Função para criar um livro
function createLivro($title, $authors, $isbn) {
    // Torna a variável $pdo acessível dentro da função
    global $pdo;

    // Prepara a consulta SQL para inserir um novo registro na tabela 'livro' com os valores fornecidos
    $stmt = $pdo->prepare("INSERT INTO livros (nome_livro, nome_autor, isbn) VALUES (?, ?, ?)");


    // Executa a consulta com os valores fornecidos
    if ($stmt->execute([$title, $authors, $isbn])) {
        echo "Livro cadastrado com sucesso!"; 
    } else {
        echo "Erro ao cadastrar o livro.";
    }
}

// // Chama a função para criar o livro
// createLivro($title, $authors, $isbn);
?>