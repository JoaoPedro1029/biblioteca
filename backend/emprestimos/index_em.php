<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Empréstimo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../frontend/css/styles.css">
</head>
<body class="container">
    <script src="../../frontend/css/script.js"></script> 
    <div class="img-container">
        <img src="../../frontend/css/img/logoCury (1).png" alt="Logo da Biblioteca" style="width: 400px; height: auto; margin-bottom: 0px;">
    </div> 
    <div class="button-container">
        <h1>Adicionar Empréstimo</h1>
        <form method="POST" action="./criar_em.php">
            <label for="aluno_nome">Nome do Aluno:</label>
            <input type="text"  class="input-custom"  name="aluno_id" id="aluno_id" required><br>

            <label for="livro_nome">Nome do Livro:</label>
            <input type="text"  class="input-custom"  name="livro_id" id="livro_id" required><br>

            <div class="input-container">
                <label for="data_retirada">Data de Retirada:</label>
                <input type="date"  class="input-custom"  name="data_retirada" id="data_retirada" required>
            </div>

            <div class="input-container">
                <label for="data_devolucao">Data de Devolução:</label>
                <input type="date"  class="input-custom" name="data_devolucao" id="data_devolucao" required>
            </div>

            <button type="submit" class="btn-custom">Criar Empréstimo</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
