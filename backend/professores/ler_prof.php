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
