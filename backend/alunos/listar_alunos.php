<?php
session_start();
include '../../config.php';

// Fetch all students from the database
try {
    $stmt = $conn->query("SELECT id, nome, serie, email FROM alunos ORDER BY nome ASC");
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar alunos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../../frontend/styles.css" />
    <style>
        #searchInput {
            margin-bottom: 15px;
            padding: 8px 12px;
            width: 100%;
            max-width: 400px;
            border: 1.8px solid #bdc3c7;
            border-radius: 6px;
            font-size: 1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #2980b9;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Lista de Alunos</h1>
    <input type="text" id="searchInput" placeholder="Pesquisar alunos..." aria-label="Pesquisar alunos" />

    <table id="alunosTable" aria-describedby="Lista de alunos cadastrados">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Série</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td><?= htmlspecialchars($aluno['nome']) ?></td>
                <td><?= htmlspecialchars($aluno['serie']) ?></td>
                <td><?= htmlspecialchars($aluno['email']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('alunosTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        for (let i = 0; i < rows.length; i++) {
            const nome = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
            const serie = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
            const email = rows[i].getElementsByTagName('td')[2].textContent.toLowerCase();
            if (nome.includes(filter) || serie.includes(filter) || email.includes(filter)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>
</body>
</html>
