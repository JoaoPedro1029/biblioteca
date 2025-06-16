<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="frontend/css/styles.css">
</head>
<body class="container">
<!-- <script src="./frontend/js/script.js"></script>  -->

    <div class="img-container">
        <img src="frontend\css\img\logoCury (1).png" alt="Logo da Biblioteca">
    </div> 

    <div class="button-container">
    <h1><strong>Bem vindo <?php echo ($_SESSION['nome']);  ?></strong></h1>
        <a href="backend/professores/index_prof.php" class="btn-custom">Adicionar Professor</a>
        <a href="backend/alunos/index_al.php" class="btn-custom">Adicionar Aluno</a>
        <a href="backend/livros/index_lv.php" class="btn-custom">Adicionar Livro </a>
        <a href="backend/emprestimos/index_em.php" class="btn-custom">Adicionar Empréstimo</a>
        <a href="logoff.php"> sair </a>
    </div>

<!-- Theme toggle button will be added dynamically by script.js -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</body>
</html>
