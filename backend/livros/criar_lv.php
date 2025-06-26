<?php
// session_start();

// Inclui o arquivo de configuração do banco de dados
include '../../config.php';
include './cadastrarlivros.php';

// Obtém os dados do formulário
$title = $_POST['title'];
$authors = $_POST['authors'];
$isbn = $_POST['isbn'];
// var_dump($title);
// Função para criar um livro
// function createLivro($title, $authors, $isbn) {
    // Torna a variável $pdo acessível dentro da função
    global $conn;

    // Prepara a consulta SQL para inserir um novo registro na tabela 'livro' com os valores fornecidos
    $stmt = $conn->prepare("INSERT INTO livros (nome_livro, nome_autor, isbn) VALUES (?, ?, ?)");

    // Executa a consulta com os valores fornecidos
    if ($stmt->execute([$title, $authors, $isbn])) {
        echo "<script>
            alert('Livro cadastrado com sucesso!');
            window.location.href = '../../inicial.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Erro ao cadastrar o livro.');
            window.history.back();
        </script>";
        exit;
    }
// }
?>
