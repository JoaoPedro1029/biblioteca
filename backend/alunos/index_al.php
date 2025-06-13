<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../frontend/css/styles.css">
</head>
<body class="container">
<script src="../../frontend/js/script.js"></script> 
    <div class="img-container">
        <img src="../../frontend\css\img\logoCury (1).png" alt="Logo da Biblioteca" style="width: 400px; height: 100hv; margin-bottom: 0px;">
    </div> 

    <div class="button-container">
        <h1>Adicionar Novo Aluno</h1>
        <form action="criar_al.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text"  class="input-custom" minlength="5" maxlength="40" id="nome" name="nome" required><br>

            <label for="serie">Série:</label>
            <input type="text"  class="input-custom" minlength="2" maxlength="2" id="serie" name="serie" required><br>

            <label for="email">Email:</label>
            <input type="email"  class="input-custom" minlength="10" maxlength="50" id="email" name="email" required><br>

            <button type="submit" class="btn-custom">Adicionar Aluno</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
