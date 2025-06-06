<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Criar Novo Livro</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../frontend/css/styles.css">
    <script src="../../frontend/js/script.js"></script> 
    
</head>
<body class="container">


    <div class="img-container">
        <img src="../../frontend\css\img\logoCury (1).png" alt="Logo da Biblioteca" style="width: 400px; height: 100hv; margin-bottom: 0px;">
    </div> 
    <div class="button-container">
        <h1>Adicionar Novo Livro</h1>
        <form method="POST" action="./cadastrarlivros.php">
                    <label for="searchType">Tipo de busca:</label>
                        <select name="searchType" id="searchType" class="form-control">
                            <option value="isbn">ISBN</option>
                                <option value="author">Autor</option>
                            <option value="title">Título</option>
                        </select>
                    <br>

                    <label for="searchValue">Valor da busca:</label>
                <input type="text"  class="input-custom" name="searchValue" id="searchValue" class="form-control">
            <br>

            <button type="submit" class="btn-custom">Pesquisar Livro</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
