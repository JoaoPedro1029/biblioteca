<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Professores</title>
    <link rel="stylesheet" href="../../frontend/css/styles.css" />
</head>
<body>
<?php
require '../../config.php';

$sql = "SELECT * FROM professores";
$stmt = $pdo->query($sql);
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($professores as $professor) {
    echo 'ID: ' . $professor['id'] . '<br>';
    echo 'Nome: ' . $professor['nome'] . '<br>';
    echo 'CPF: ' . $professor['cpf'] . '<br>';
    echo 'Email: ' . $professor['email'] . '<br><br>';
}
?>
</body>
</html>
