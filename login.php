<?php
    session_start();
    include 'config.php';


    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];


    $stmt = $conn->prepare("SELECT * FROM professores WHERE cpf = :cpf");
    $stmt->execute([':cpf' => $cpf]);
    
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Executa a consulta com os valores fornecidos
    if (password_verify($senha, $result [0] ["senha"])) {
        $_SESSION['nome'] = $result[0]["nome"];
       header("location: inicial.php"); 
    } else {
        echo "senha ou CPF incorreto.";
        header("location: index.php"); 
    }
?>