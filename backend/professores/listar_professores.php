<?php
session_start();
include '../../config.php';

// Fetch all professors from the database
try {
    $stmt = $conn->query("SELECT id, nome, cpf, email FROM professores ORDER BY nome ASC");
    $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar professores: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Professores</title>
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
        .container {
            color:rgb(0, 0, 0);
            max-width: 900px;
            text-align: center;
            margin: 0 auto;
            padding: 20px;
            background-color: #2c3e50;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .table-container {
            max-height: 400px;
            text-align: center;
            overflow-x: auto;
            margin-top: 10px;
            border: 1px solid #2980b9;
            border-radius: 6px;
            background-color: #ecf0f1;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            min-width: 600px;
            margin: 0;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }
        th {
            background-color: #2980b9;
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #d1e7fd;
        }
        button.delete-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #e74c3c;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        button.delete-btn:hover {
            color: #c0392b;
        }
    </style>
</head>
<body>
<?php 
$backUrl = '../../inicial.php';
include '../includes/back_button.php'; 
?>
<div class="container">
    <h1>Lista de Professores</h1>
    <input type="text" id="searchInput" placeholder="Pesquisar professores..." aria-label="Pesquisar professores" />
    <div class="table-container">
        <table id="professoresTable" aria-describedby="Lista de professores cadastrados" class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor): ?>
                <tr data-id="<?= htmlspecialchars($professor['id']) ?>">
                    <td><?= htmlspecialchars($professor['nome']) ?></td>
                    <td><?= htmlspecialchars($professor['cpf']) ?></td>
                    <td><?= htmlspecialchars($professor['email']) ?></td>
                    <td>
                        <button class="delete-btn" title="Excluir Professor">
                            🗑️
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

    <script>
    const searchInput = document.getElementById('searchInput');
    const table = document.getElementById('professoresTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        for (let i = 0; i < rows.length; i++) {
            const nome = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
            const cpf = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
            const email = rows[i].getElementsByTagName('td')[2].textContent.toLowerCase();
            if (nome.includes(filter) || cpf.includes(filter) || email.includes(filter)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
    </script>
</body>
</html>
