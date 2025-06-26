<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Professor</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href = "../../frontend/styles.css">
   <script src="../../frontend/js/script.js"></script> 
</head>
<body class="container">
    <div class="logo-container">
        <img src="../../frontend\css\img\logoCury (1).png" alt="Logo da Biblioteca" style="width: 400px; height: 100hv; margin-bottom: 0px;">
    </div>
     <div class="button-group">
    <h1>Adicionar Novo Professor</h1>
    <form action="./criar_prof.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" minlength="5" maxlength="40" id="nome" name="nome" required>

        <label for="cpf">CPF:</label>
        <input type="text" maxlength="11" minlength="11" id="cpf" name="cpf" required>

        <label for="email">Email:</label>
        <input type="email" minlength="10" maxlength="40" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <br>
        <div class="password-wrapper">
            <input type="password" minlength="8" maxlength="32" id="senha" name="senha" required>
            <span id="toggle-password" class="password-toggle">👁️</span>
        </div>
        
        <button type="submit">Adicionar Professor</button>
    </form>
</div>
<script>
    // Obter o campo de senha e o ícone do olho
    const passwordField = document.getElementById("senha");
    const togglePasswordIcon = document.getElementById("toggle-password");

    // Adicionar evento de clique no ícone
    togglePasswordIcon.addEventListener("click", function() {
        // Verificar o tipo de campo de senha e alternar entre "password" e "text"
        if (passwordField.type === "password") {
            passwordField.type = "text";
            togglePasswordIcon.textContent = "🙈"; // Mudar o ícone para "ocultar"
        } else {
            passwordField.type = "password";
            togglePasswordIcon.textContent = "👁️"; // Mudar o ícone para "revelar"
        }
    });
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
