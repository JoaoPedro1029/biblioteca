<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Empréstimo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../frontend/styles.css">
</head>
<body class="container">
    <script src="../../frontend/js/script.js"></script> 
    <div class="logo-container">
        <img src="../../frontend/css/img/logoCury (1).png" alt="Logo da Biblioteca" style="width: 400px; height: auto; margin-bottom: 0px;">
    </div> 
    <div class="button-group">
        <h1>Adicionar Empréstimo</h1>
        <form method="POST" action="./criar_em.php">
        <label for="aluno_nome">Nome do Aluno:</label>
        <input type="hidden" name="aluno_id" id="aluno_id" required>
        <input type="text" name="aluno_nome" id="aluno_nome" autocomplete="off" required>
        <div id="aluno_suggestions" class="suggestions"></div>

            <label for="livro_nome">Nome do Livro:</label>
            <input type="text" name="livro_id" id="livro_id" required>

            <div class="input-container">
                <label for="data_retirada">Data de Retirada:</label>
                <input type="date" name="data_retirada" id="data_retirada" required>
            </div>

            <div class="input-container">
                <label for="data_devolucao">Data de Devolução:</label>
                <input type="date" name="data_devolucao" id="data_devolucao" required>
            </div>

            <button type="submit">Criar Empréstimo</button>
        </form>
    </div>

    <style>
        .suggestions {
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
            position: absolute;
            background: white;
            width: 100%;
            z-index: 1000;
            cursor: pointer;
        }
        .suggestion-item {
            padding: 8px 12px;
        }
        .suggestion-item:hover {
            background-color: #2980b9;
            color: white;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#aluno_nome').on('input', function() {
                const query = $(this).val();
                if (query.length < 1) {
                    $('#aluno_suggestions').empty();
                    return;
                }
                $.ajax({
                    url: '../../backend/alunos/search_alunos.php',
                    method: 'GET',
                    data: { q: query },
                    success: function(data) {
                        let suggestions = '';
                        data.forEach(function(aluno) {
                        suggestions += '<div class="suggestion-item" data-id="' + aluno.id + '" data-name="' + aluno.nome + '">' + aluno.nome + '</div>';
                        });
                        $('#aluno_suggestions').html(suggestions);
                    }
                });
            });

            $(document).on('click', '.suggestion-item', function() {
            const name = $(this).data('name');
            const id = $(this).data('id');
            $('#aluno_nome').val(name);
            $('#aluno_id').val(id);
            $('#aluno_suggestions').empty();
            });

            // Close suggestions when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#aluno_nome, #aluno_suggestions').length) {
                    $('#aluno_suggestions').empty();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
