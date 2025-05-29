<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Informações sobre o Livro</title>
    <link rel="stylesheet" href="../../frontend/css/styles.css" />
</head>
<body>
<?php
session_start();
include ('../../config.php'); // Inclui o arquivo de configuração

// Obtém os valores do formulário
$searchQuery = isset($_POST['searchValue']) ? $_POST['searchValue'] : ''; // O ISBN, nome do autor ou título do livro que você quer pesquisar
$searchType = isset($_POST['searchType']) ? $_POST['searchType'] : ''; // O tipo de busca (ISBN, autor, título)

// Verifica se a busca foi iniciada
if (!empty($searchQuery) && !empty($searchType)) {
    // Determina a URL da API do Google Livros com base no tipo de busca
    if ($searchType === 'isbn') {
        // URL da API do Google Livros, configurada para buscar pelo ISBN
        $apiUrl = "https://www.googleapis.com/books/v1/volumes?q=isbn:" . urlencode($searchQuery);
    } else {
        // URL da API do Google Livros, configurada para buscar por palavras-chave
        $apiUrl = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($searchType . ':' . $searchQuery);
        
    }

    $ch = curl_init(); // Inicializa a sessão cURL

    // Define as opções do cURL
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Executa a requisição e armazena a resposta
    $response = curl_exec($ch);

    // Checa se houve erro na requisição
    if (curl_errno($ch)) {
        echo 'Erro: ' . curl_error($ch);
    }

    // Fecha a conexão cURL
    curl_close($ch);

    // Decodifica a resposta JSON
    $data = json_decode($response, true);

    $quantidade = count($data);

    // var_dump($response);

    // Verifica se o livro foi encontrado
    if (isset($data['items']) && count($data['items']) > 0) {
        
        for ($i = 0; $i < count($data['items']); $i++) {
        $book = $data['items'][$i]; // A primeira correspondência de livro

        // Exibe informações sobre o livro
        $title= $book['volumeInfo']['title'];
        $authors= isset($book['volumeInfo']['authors']) ? implode(', ', $book['volumeInfo']['authors']) : 'Não cadastrado'; // Exibe autores se houver
        $publisher = isset($book['volumeInfo']['publisher']) ? $book['volumeInfo']['publisher'] : 'Não cadastrado'; // Exibe editora se houver
        $publishedDate = isset($book['volumeInfo']['publishedDate']) ? $book['volumeInfo']['publishedDate'] : 'Não cadastrado';
        $description = isset($book['volumeInfo']['description']) ? nl2br($book['volumeInfo']['description']) : 'Descrição não disponível';
        $isbn= isset($book['volumeInfo']['isbn']) ? $book['volumeInfo']['isbn'] : 'ISBN não disponível';
        $pageCount = isset($book['volumeInfo']['pageCount']) ? $book['volumeInfo']['pageCount'] : 'Não cadastrado';
        $thumbnail = isset($book['volumeInfo']['imageLinks']['thumbnail']) ? $book['volumeInfo']['imageLinks']['thumbnail'] : 'Capa não encontrada';

        // Exibe as informações do livro
        echo "<h1>Informações sobre o Livro</h1>";
        echo "<strong>Título:</strong> $title<br>";
        echo "<strong>Autor(es):</strong> $authors<br>";
        echo "<strong>Editora:</strong> $publisher<br>";
        echo "<strong>Data de publicação:</strong> $publishedDate<br>";
        echo "<strong>Páginas:</strong> $pageCount<br>";
        echo "<strong>Descrição:</strong> $description<br>";
        $_SESSION['title'] = $title;
        $_SESSION['author'] = $authors;
        $_SESSION['isbn'] = $isbn;
        
        // Exibe a imagem da capa (se disponível)
        if ($thumbnail) {
            echo "<img src='$thumbnail' alt='Capa do livro'><br>";
        }
        ?>
        <input type="hidden" name="title" value="<?php echo $title; ?>">
                    <!-- Formulário para cadastrar um novo livro -->
            <form method="POST" action="./criar_lv.php"> <!-- Altere o caminho conforme necessário -->
                <button type="submit">Cadastrar Novo Livro</button>
            </form>

<?php
        }
    } else {
        echo "Livro não encontrado para a busca: $searchQuery"; // Mensagem se nenhum livro for encontrado
    }
} else {
    // echo "Por favor, preencha todos os campos de busca."; // Mensagem se os campos não forem preenchidos
}
?>
</body>
</html>
