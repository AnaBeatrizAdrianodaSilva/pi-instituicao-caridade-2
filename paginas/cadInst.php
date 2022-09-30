<?php
    include "../include/functions.php";
    include "../include/MySql.php";

    $msgErro = "";
    $descricao = $nome = "";
    $valor = 0;

    if (isset($_POST["submit"])){
        if (!empty($_FILES["image"]["name"])){
            //Pegar informações
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            //Permitir somente alguns formatos
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = file_get_contents($image);

                if (isset($_POST['nome'])){
                    $nome = $_POST['nome'];
                } else {
                    $nome = "";
                }
                if (isset($_POST['descricao'])){
                    $descricao = $_POST['descricao'];
                } else {
                    $descricao = "";
                }
                if (isset($_POST['valor'])){
                    $valor = $_POST['valor'];
                } else {
                    $valor = "";
                }

                //Gravar no banco
                $sql = $pdo->prepare("INSERT INTO PRODUTO (codProduto, nomeProduto, descProduto, valorProduto, imagem)
                                      VALUES (null, ?,?,?,?)");
                if ($sql->execute(array($nome, $descricao, $valor, $imgContent))){
                    $msgErro = "Dados cadastrados com suscesso!";
                } else {
                    $msgErro = "Dados não cadastrados!";
                }

            } else {
                $msgErro = "Desculpe, mas somente arquivos JPG, JPEG, PNG e GIF são permitidos";
            }
        } else {
            $msgErro = "Selecione uma imagem para upload";
        }
    }

?>
<?php
    require ('../templates/header.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/styleCadastro.css"> 
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
        <h1>Cadastra</h1>

        <label for="email">Nome Completo:</label>
        <br>
        <input type="text" name="nome" value="<?php echo $nome?>">
        <span class="obrigatorio">* <?php echo $nomeErr ?></span>
        <br>

        <label for="senha">Email:</label>
        <br>
        <input type="text" name="email" value="<?php echo $email?>">
        <span class="obrigatorio">* <?php echo $emailErr ?></span>
        <br>
        
        <label for="senha">CPF:</label>
        <br>
        <input type="text" name="cpf" value="<?php echo $cpf?>">
        <span class="obrigatorio">* <?php echo $cpfErr ?></span>
        <br>
        
        <label for="senha">Senha:</label>
        <br>
        <input type="text" name="senha" value="<?php echo $senha?>">
        <span class="obrigatorio">* <?php echo $senhaErr ?></span>
        <br>
        <br>
        <input class="botao" type="submit" value="Salvar" name="cadastro">
        <span class="obrigatorio"><?php echo $msgErr ?></span>
        <p>Já uma conta?<a href="login.php">Entre aqui</a></p>
    </form>
</body>
</html>
<?php
    require ('../templates/footer.php');
?>