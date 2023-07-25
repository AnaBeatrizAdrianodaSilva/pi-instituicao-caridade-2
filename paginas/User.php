<?php
session_start();

$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "";

// Include your database connection file
include "../include/MySql.php"; // Atualize o caminho, se necessário

// Configurações do OAuth2
require '../vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('976744990343-n0cqrpppkmhks8ta6dc2i2tq1vdr52mi.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://seu-dominio.com/paginas/user.php');
$client->setAuthConfig('../config/credentials.json');
$client->addScope(Google_Service_Drive::DRIVE_FILE);

// Verifica se o usuário já está autenticado ou redireciona para a tela de autenticação
if (!isset($_SESSION['access_token']) && isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
} elseif (!isset($_SESSION['access_token'])) {
    $authUrl = $client->createAuthUrl();
    header("Location: $authUrl");
    exit;
}

// Configura o cliente com o token de acesso
$client->setAccessToken($_SESSION['access_token']);

// Cria um serviço do Google Drive
$driveService = new Google_Service_Drive($client);

// Fetch all contents posted by the logged-in user from the "posts" table using a JOIN query
$contents = array();
try {
    if (isset($_SESSION['nome'])) {
        $stmt = $pdo->prepare("SELECT users.nome AS nome, posts.conteudo AS conteudo, posts.data AS data, posts.fk_id_imagens AS fk_id_imagens FROM posts 
                              INNER JOIN users ON posts.fk_id_users = users.id_users 
                              WHERE users.nome = :nome ORDER BY posts.id_posts DESC");
        $stmt->bindParam(':nome', $_SESSION['nome']);
        $stmt->execute();
        $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    // Handle any PDO exceptions
    die("Error: " . $e->getMessage());
}

// Insert new content into the "posts" table if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['nome'])) {
        // Redirect the user to the login page if not logged in
        header("Location: login.php");
        exit;
    }

    // Get the content from the textarea
    $conteudo = $_POST['conteudo'];

    // Get the user ID from the session (replace 'id_users' with the actual session variable name for user ID)
    $user_id = $_SESSION['id_users'];

    // Check if an image was uploaded
    $file_id = null; // Initialize with null to handle posts without files
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Upload the image to Google Drive
        $imagem = $_FILES['imagem'];
        $nome_imagem = $imagem['name'];
        $nome_temporario_imagem = $imagem['tmp_name'];

        // Crie um novo objeto de metadados para o arquivo no Google Drive
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $nome_imagem,
        ]);

        try {
            // Envie o arquivo para o Google Drive
            $file = $driveService->files->create($fileMetadata, [
                'data' => file_get_contents($nome_temporario_imagem),
                'uploadType' => 'multipart',
                'fields' => 'id',
            ]);

            // Obtenha o ID do arquivo recém-carregado no Google Drive
            $file_id = $file->id;
        } catch (Exception $e) {
            // Trate qualquer exceção que ocorra durante o envio do arquivo para o Google Drive
            echo "Erro ao enviar a imagem para o Google Drive.";
        }
    }

    try {
        // Prepare and execute SQL statement to insert data into the "posts" table with the current timestamp
        $sql = "INSERT INTO posts (fk_id_users, conteudo, fk_id_imagens, data) VALUES (:fk_id_users, :conteudo, :fk_id_imagens, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fk_id_users', $user_id);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->bindParam(':fk_id_imagens', $file_id); // Save the Google Drive file ID instead of the ID
        $stmt->execute();

        // Data saved successfully, redirect back to the same page to avoid form resubmission
        header("Location: user.php");
        exit;
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        echo "Erro ao salvar o post no banco de dados.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <h1>
        <?php echo $nome; ?>
    </h1>

    <?php if (!empty($contents)) : ?>
        <?php foreach ($contents as $content) : ?>
            <div>
                <?php echo $content['conteudo']; ?>
                <?php if (!empty($content['data'])) : ?>
                    <br>
                    <span style="color: gray;"><?php echo $content['data']; ?></span>
                <?php endif; ?>
                <?php if (!empty($content['fk_id_imagens'])) : ?>
                    <?php
                    // Obter a imagem do Google Drive com base no file_id associado ao post
                    try {
                        $file = $driveService->files->get($content['fk_id_imagens']);
                        $contentLink = $file->webViewLink;
                        // Exibir a imagem
                        echo '<br><img src="' . $contentLink . '" alt="Imagem do post">';
                    } catch (Exception $e) {
                        echo "Erro ao obter a imagem do Google Drive.";
                    }
                    ?>
                <?php endif; ?>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="post" action="user.php" enctype="multipart/form-data">
        <textarea name="conteudo" rows="5" cols="40"></textarea>
        <br>
        <input type="file" name="imagem" id="imagem">
        <br>
        <br>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
