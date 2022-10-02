<?php
    include "../include/MySql.php";
    include "../include/functions.php";

    session_start();
    $_SESSION['nome'] = "";
    $_SESSION['administrador'] = "";

    $email = $senha = "";
    $emailErr = $senhaErr = $msgErr = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (empty($_POST['email'])){
            $emailErr = "Email é obrigatório!";
        } else {
            $email = test_input($_POST["email"]);
        }

        if (empty($_POST['senha'])){
            $senhaErr = "Senha é obrigatória!";
        } else {
            $senha = test_input($_POST['senha']);
        }

        // Codigo para consultar os dados no Banco de Dados
        //Consulta no banco de dados
        $sql = $pdo->prepare("SELECT * FROM cadastro 
                              WHERE email = ? AND senha = ?");
        if ($sql->execute(array($email,MD5($senha)))){
            $info = $sql->fetchAll(PDO::FETCH_ASSOC); //deve estar o problema aqui
            if (count($info) > 0) { 
                foreach($info as $key => $values){
                    $_SESSION['nome'] = $values['nome'];
                    $_SESSION['administrador'] = $values['administrador'];
                    
                }
                header('location:index.php');
            } else {
                echo '<h6>Email ou senha não cadastrados</h6>';
            }
        }  
    }

?>
<?php
    require("../templates/headerResto.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/styleLogin.css"> 
    <link rel="stylesheet" href="../CSS/styleHeader.css">
    <link rel="stylesheet" href="CSS/styleFooter.css">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font-family: 'Mulish', sans-serif; -->
</head>

<body>
    <!-- <div class="container"> -->
    <form method="POST" action="" class="form">
        <h1>Login</h1>

        <label for="email">Email:</label>
        <br>
        <input type="text" name="email" value="<?php echo $email?>">
            <span class="obrigatorio">* <?php echo $emailErr ?></span>
        <br>

        <label for="senha">Senha:</label>
        <br>
        <input type="text" name="senha" value="<?php echo $senha?>">
            <span class="obrigatorio">* <?php echo $senhaErr ?></span>
        <br>
        <br>

        <input class="botao" type="submit" value="Entrar" name="cadastro">
        <span class="obrigatorio"><?php echo $msgErr ?></span>
        <p>Não possui conta?<a href="cadastro.php">Cadastre-se</a></p>
    </form>
</body>
</html>
<?php
    require("../templates/footer.php");
?>
