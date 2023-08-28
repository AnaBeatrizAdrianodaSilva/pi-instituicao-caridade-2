<?php
session_start();
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "";

// Include your database connection file
include "../include/MySql.php"; // Atualize o caminho, se necessário

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

    // Get the user ID from the session (replace 'id_do_usuario' with the actual session variable name for user ID)
    $user_id = $_SESSION['id_do_usuario'];

    // Check if an image was uploaded
    $id_imagens = null; // Initialize with null to handle posts without images
    $nome_imagem = null; // Initialize with null to handle posts without images
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Primeiro, salve a imagem na tabela "imagens" e obtenha o ID da imagem inserida
        $imagem = $_FILES['imagem'];
        $nome_temporario_imagem = $imagem['tmp_name'];

        // Lendo a imagem como uma representação binária (bytes)
        $imagem_binaria = file_get_contents($nome_temporario_imagem);

        // Obtendo o nome original da imagem
        $nome_imagem = $imagem['name'];

        try {
            $stmt = $pdo->prepare("INSERT INTO imagens (nome, imagem) VALUES (:nome, :imagem)");
            $stmt->bindParam(':nome', $nome_imagem);
            $stmt->bindParam(':imagem', $imagem_binaria, PDO::PARAM_LOB);
            $stmt->execute();

            print_r($stmt);

            // Obtendo o ID da imagem recém-inserida
            $id_imagens = $pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Erro ao salvar a imagem no banco de dados.";
            exit;
        }
    } else {
        echo "Não en";
    }

    try {
        // Prepare and execute SQL statement to insert data into the "posts" table with the current timestamp
        if (!$id_imagens) {
            $id_imagens = null;

        }


        $sql = "INSERT INTO posts (fk_id_users, conteudo, fk_id_imagens, data) VALUES (:fk_id_users, :conteudo, :fk_id_imagens, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fk_id_users', $user_id);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->bindParam(':fk_id_imagens', $id_imagens, PDO::PARAM_INT); // Use PDO::PARAM_INT for integer values
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
oioioiioiiioioi
    <?php if (!empty($contents)): ?>
        <?php foreach ($contents as $content): ?>
            <div>
                <?php echo $content['conteudo']; ?>
                <?php if (!empty($content['data'])): ?>
                    <br>
                    <span style="color: gray;">
                        <?php echo $content['data']; ?>
                    </span>
                <?php endif; ?>
                <?php if (!empty($content['id_imagens'])): ?>
                    <?php
                    // Obter a imagem do banco de dados com base no id_imagens associado ao post
                    try {
                        $stmt = $pdo->prepare("SELECT imagem FROM imagens WHERE id_imagens = :id_imagens");
                        $stmt->bindParam(':id_imagens', $content['id_imagens']);
                        $stmt->execute();
                        $imagem = $stmt->fetch();

                        // Exibir a imagem
                        echo '<br><img src="data:image/jpeg;base64,' . base64_encode($imagem['imagem']) . '" alt="Imagem do post">';
                    } catch (PDOException $e) {
                        echo "Erro ao obter a imagem do banco de dados.";
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