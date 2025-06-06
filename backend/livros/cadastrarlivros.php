<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="../../frontend/css/styles.css" />
</head>
<body>
<div class="form-container">
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
    // var_dump($response);
    // Checa se houve erro na requisição
    if (curl_errno($ch)) {
        echo 'Erro: ' . curl_error($ch);
    }

    // Fecha a conexão cURL
    curl_close($ch);

    // Decodifica a resposta JSON
    $data = json_decode($response, true);

    $quantidade = isset($data['items']) ? count($data['items']) : 0;

    var_dump($apiUrl);

    // Verifica se o livro foi encontrado
    if ($quantidade >= 0) {
        echo "<div class='results-count'>Foram encontrados $quantidade resultados.</div>";
        // var_dump($data);
        for ($i = 0; $i <= $quantidade; $i++) {
        $book = $data['items'][$i]; // A primeira correspondência de livro

        // Exibe as informações do livro com separação em divs
        $title= $book['volumeInfo']['title'];
        var_dump($title);
        $authors= isset($book['volumeInfo']['authors']) ? implode(', ', $book['volumeInfo']['authors']) : 'Não cadastrado'; // Exibe autores se houver
        $publisher = isset($book['volumeInfo']['publisher']) ? $book['volumeInfo']['publisher'] : 'Não cadastrado'; // Exibe editora se houver
        $publishedDate = isset($book['volumeInfo']['publishedDate']) ? $book['volumeInfo']['publishedDate'] : 'Não cadastrado';
        $description = isset($book['volumeInfo']['description']) ? nl2br($book['volumeInfo']['description']) : 'Descrição não disponível';
        $isbn= isset($book['volumeInfo']['isbn']) ? $book['volumeInfo']['isbn'] : 'ISBN não disponível';
        $pageCount = isset($book['volumeInfo']['pageCount']) ? $book['volumeInfo']['pageCount'] : 'Não cadastrado';
        $thumbnail = isset($book['volumeInfo']['imageLinks']['thumbnail']) ? $book['volumeInfo']['imageLinks']['thumbnail'] : 'Capa não encontrada';

        echo "<h1>Informações sobre o Livro</h1>";
        echo "<div class='book-info-item'><strong>Título:</strong> $title</div>";
        echo "<div class='book-info-item'><strong>Autor(es):</strong> $authors</div>";
        echo "<div class='book-info-item'><strong>Editora:</strong> $publisher</div>";
        echo "<div class='book-info-item'><strong>Data de publicação:</strong> $publishedDate</div>";
        echo "<div class='book-info-item'><strong>Páginas:</strong> $pageCount</div>";
        echo "<div class='book-info-item'><strong>Descrição:</strong> $description</div>";
        $_SESSION['title'] = $title;
        var_dump($_SESSION['title']);
        $_SESSION['author'] = $authors;
        $_SESSION['isbn'] = $isbn;
        
        if ($thumbnail) {
            echo "<div class='book-info-item'><img src='$thumbnail' alt='Capa do livro'></div>";
        }
        ?>
        <form method="POST" action="./criar_lv.php">
            <input type="hidden"  class="input-custom" name="title" value="<?php echo $title; ?>">
            <input type="hidden"   class="input-custom" name="authors" value="<?php echo $authors; ?>">
            <input type="hidden"  class="input-custom" name="isbn" value="<?php echo $isbn; ?>">
            <button class="btn-custom" type="submit">Cadastrar Novo Livro</button>
        </form>

<?php
        }
    } else {
        echo "Livro não encontrado para a busca: $searchQuery";
    }
} else {
    // echo "Por favor, preencha todos os campos de busca.";
}
?>
</div>
</body>
</html>
