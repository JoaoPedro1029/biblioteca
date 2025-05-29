<?php
// Configurações do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor de banco de dados
$dbname = 'biblioteca'; // substitua pelo nome do seu banco de dados
$username = 'root'; // substitua pelo seu nome de usuário
$password = ''; // substitua pela sua senha

try {
    // Cria uma nova conexão PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Define o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Captura e exibe erros de conexão
    echo "Erro na conexão: " . $e->getMessage();
}
?>