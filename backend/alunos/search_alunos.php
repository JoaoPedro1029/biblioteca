<?php
header('Content-Type: application/json');
include '../../config.php';

$search = isset($_GET['q']) ? trim($_GET['q']) : '';

try {
    if ($search === '') {
        $stmt = $pdo->query("SELECT id, nome FROM alunos ORDER BY nome ASC LIMIT 50");
    } else {
        $stmt = $pdo->prepare("SELECT id, nome FROM alunos WHERE nome LIKE ? ORDER BY nome ASC LIMIT 50");
        $stmt->execute(["%$search%"]);
    }
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($alunos);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
