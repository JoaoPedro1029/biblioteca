<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="frontend/styles.css">
    <!-- <script src="./frontend/js/script.js"></script>  -->
</head>
<body>
    <div class="logo-container">
        <img src="frontend/img/logoCury (1).png" alt="Logo da Biblioteca">
    </div>

<div class="container">
    <form action="login.php" method="post">
    <h1> Login </h1>
        <label for="cpf"></label>
        <input type="text" placeholder="Digite seu CPF" maxlength="11" minlength="11" id="cpf" name="cpf" required>
        <div class="password-wrapper">  
            <input type="password" placeholder="Digite sua senha" minlength="8" maxlength="255" id="senha" name="senha" required>
            <span id="toggle-password" class="password-toggle">👁️</span>
        </div> 

        <button type="submit">login</button>
    </form>
</div>

<!-- Theme toggle button will be added dynamically by script.js -->

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

</body>
</html>
