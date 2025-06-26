<?php
// Inclui o arquivo de conexão com o banco de dados
include ('../../config.php');

// Verifica se a requisição é do tipo POST (ou seja, se o formulário foi enviado)
//Formuláriio enviado de index_prof.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os valores dos campos do formulário enviados pelo método POST
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    // Faz o hash da senha usando o algoritmo MD5 para aumentar a segurança
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Hash da senha

    // Monta a consulta SQL para inserir um novo registro na tabela 'professor'
    $sql = "INSERT INTO professores (nome, cpf, email, senha) VALUES (?, ?, ?, ?)";
    // Prepara a consulta para ser executada no banco de dados
    $stmt = $conn->prepare($sql);
    // Executa a consulta com os valores dos campos
    $executado = $stmt->execute([$nome, $cpf, $email, $senha]);

    if ($executado) {
        echo "<script>
            alert('Professor cadastrado com sucesso!');
            window.location.href = '../../inicial.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Erro ao cadastrar professor.');
            window.history.back();
        </script>";
        exit;
    }
}
?>
