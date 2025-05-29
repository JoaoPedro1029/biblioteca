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
    $stmt->execute([$nome, $cpf, $email, $senha]);
    // Exibe uma mensagem de sucesso
    
    // echo 'Professor adicionado com sucesso';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro concluido</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../frontend/css/styles.css">
        <link rel="stylesheet" href="../../frontend/js/script.js">
    </head>
    <body>
    <div class="form-container">
      <h1>Professor cadastrado com sucesso!</h1>     
    </body>
</html>
