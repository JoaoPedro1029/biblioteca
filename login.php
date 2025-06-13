<?php
    session_start();
    include 'config.php';


    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];


    // Prepara a consulta SQL para inserir um novo registro na tabela 'livro' com os valores fornecidos
    $stmt = $conn->prepare("SELECT * FROM professores WHERE cpf = :cpf");
    $stmt->execute([':cpf' => $cpf]);
    
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Executa a consulta com os valores fornecidos
    if (password_verify($senha, $result [0] ["senha"])) {
        $_SESSION['nome'] = $result[0]["nome"];
        $_SESSION['id'] = $result[0]["id"];
       header("location: inicial.php"); 
    } else {
        echo "senha ou CPF incorreto.";
        header("location: index.php"); 
    }
?>