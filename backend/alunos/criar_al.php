<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Criar Aluno</title>
    <link rel="stylesheet" href="../../frontend/styles.css" />
</head>
<body>
<?php
// Inclui o arquivo db.php que provavelmente contém a conexão com o banco de dados.
include ('../../config.php');

// Verifica se o formulário foi enviado usando o método POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os valores dos campos do formulário.
    $nome = $_POST['nome'];
    $serie = $_POST['serie'];
    $email = $_POST['email'];

    // Cria a instrução SQL para inserir os dados capturados (nome, série e email) na tabela aluno.
    $sql = "INSERT INTO alunos (nome, serie, email) VALUES (?, ?, ?)";

    // Prepara a consulta SQL.
    $stmt = $conn->prepare($sql);

    // Executa a consulta com os valores dos campos.
    $executado = $stmt->execute([$nome, $serie, $email]);

    // Verifica se a consulta foi executada com sucesso.
    if ($executado) {
        // Se a execução for bem-sucedida, exibe a mensagem de sucesso.
        echo "<script>
            alert('Aluno cadastrado com sucesso!');
            window.location.href = '../../inicial.php';
        </script>";
        exit;
    } else {
        // Caso ocorra um erro na execução, exibe a mensagem de erro.
        echo "<script>
            alert('Erro ao cadastrar aluno.');
            window.history.back();
        </script>";
        exit;
    }
}
?>
</body>
</html>
