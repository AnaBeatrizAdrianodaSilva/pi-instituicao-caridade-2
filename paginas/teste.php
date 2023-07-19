<?php
// Conexão com o banco de dados
define('HOST', 'localhost');
    define('PORT', '3306');// Porta do MySql
    define('DB', 'pi'); //aqui vai o nome do banco de dados
    define('USER', 'root');
    define('PASS', '');

    try{
        //conexao
        $pdo = new PDO('mysql:host='.HOST.';PORT='.PORT.';dbname='.DB,
                       USER,
                       PASS,
                       array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
    } catch (Exception $e){
        echo 'Erro';
    }

// Lidar com o formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        // Inserir os dados na tabela
        $stmt = $pdo->prepare("INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Erro ao cadastrar: " . $e->getMessage());
    }
}

// Exibir os dados cadastrados
try {
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Pessoas</title>
</head>
<body>
    <h1>Cadastro de Pessoas</h1>

    <h2>Novo Cadastro:</h2>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>

    <h2>Pessoas Cadastradas:</h2>
    <ul>
        <?php foreach ($users as $users) { ?>
            <li><?php echo $users['nome'] . ' - ' . $users['email']; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
