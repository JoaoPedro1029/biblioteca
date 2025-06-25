<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Relatório de Livros Mais Emprestados da Semana</title>
    <link rel="stylesheet" href="../../frontend/styles.css" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f9f9;
            color: #333;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background-color: #fff;
            max-width: 700px;
            width: 100%;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        #chart_div {
            width: 100%;
            height: 400px;
        }
    </style>
    -->
</head>
<body>
<?php 
$backUrl = '../../inicial.php';
include '../includes/back_button.php'; 
?>
<div class="container">
    <h1>Livros Mais Emprestados da Semana</h1>
    <div id="chart_div"></div>
</div>

<?php
include('../../config.php');

// Query to get the most borrowed books in the last 7 days
$query = "
    SELECT l.title, COUNT(e.id) AS emprestimos_count
    FROM emprestimos e
    JOIN livros l ON e.livro_id = l.id
    WHERE e.data_emprestimo >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
    GROUP BY l.title
    ORDER BY emprestimos_count DESC
    LIMIT 10
";

try {
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dataArray = [['Livro', 'Quantidade de Empréstimos']];
    if ($rows && count($rows) > 0) {
        foreach ($rows as $row) {
            $dataArray[] = [$row['title'], (int)$row['emprestimos_count']];
        }
    } else {
        $dataArray[] = ['Nenhum dado', 0];
    }
} catch (PDOException $e) {
    $dataArray = [['Erro', 0]];
}

?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($dataArray); ?>);

        var options = {
            title: 'Livros Mais Emprestados da Semana',
            legend: { position: 'none' },
            colors: ['#2980b9'],
            hAxis: {
                title: 'Quantidade de Empréstimos',
                minValue: 0
            },
            vAxis: {
                title: 'Livro'
            },
            chartArea: {width: '70%', height: '70%'}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
</body>
</html>
