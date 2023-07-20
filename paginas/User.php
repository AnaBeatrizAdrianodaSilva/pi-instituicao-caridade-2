<?php
session_start();
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['nome'])) {
        // Redirect the user to the login page if not logged in
        header("Location: login.php");
        exit;
    }

    // Get the content from the textarea
    $conteudo = $_POST['conteudo'];

    // Include your database connection file
    include "../include/MySql.php"; // Update the path if needed

    try {
        // Prepare and execute SQL statement to get the user ID from the "users" table
        $stmt = $pdo->prepare("SELECT id FROM users WHERE nome = :nome");
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        $user = $stmt->fetch();

        if (!$user) {
            // User not found in the "users" table, handle the error
            echo "Error: User not found.";
            exit;
        }

        $user_id = $user['id'];

        // Prepare and execute SQL statement to insert data into the "posts" table
        $sql = "INSERT INTO posts (fk_id_users, conteudo) VALUES (:fk_id_users, :conteudo)";
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

    <form method="post" action="user.php">
        <textarea name="conteudo" rows="5" cols="40"></textarea>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>
