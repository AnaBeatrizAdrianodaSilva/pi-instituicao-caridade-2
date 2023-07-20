<?php
session_start();
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "";

// Include your database connection file
include "../include/MySql.php"; // Update the path if needed

// Fetch all contents posted by the logged-in user from the "posts" table using a JOIN query
$contents = array();
try {
    if (isset($_SESSION['nome'])) {
        $stmt = $pdo->prepare("SELECT users.nome AS nome, posts.conteudo AS conteudo, posts.data AS data FROM posts 
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

    try {
        // Prepare and execute SQL statement to get the user ID from the "users" table
        $stmt = $pdo->prepare("SELECT id_users FROM users WHERE nome = :nome");
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        $user = $stmt->fetch();

        if (!$user) {
            // User not found in the "users" table, handle the error
            echo "Error: User not found.";
            exit;
        }

        $user_id = $user['id_users'];

        // Prepare and execute SQL statement to insert data into the "posts" table with the current timestamp
        $sql = "INSERT INTO posts (fk_id_users, conteudo, data) VALUES (:fk_id_users, :conteudo, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fk_id_users', $user_id);
        $stmt->bindParam(':conteudo', $conteudo);

        if ($stmt->execute()) {
            // Data saved successfully, redirect back to the same page to avoid form resubmission
            header("Location: user.php");
            exit;
        } else {
            // There was an error, handle it accordingly (display an error message or log it)
            echo "Error executing the query.";
        }
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        echo "Error: " . $e->getMessage();
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

    <h2>All Contents:</h2>
    <?php if (!empty($contents)) : ?>
            <?php foreach ($contents as $content) : ?>
                    <?php echo $content['conteudo']; ?>
                    <br />
                    <span style="color: gray;">(<?php echo $content['data']; ?>)</span>
                    <br />
                    <br />
            <?php endforeach; ?>
    <?php else : ?>
        <p>No contents found.</p>
    <?php endif; ?>

    <form method="post" action="user.php">
        <textarea name="conteudo" rows="5" cols="40"></textarea>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>
