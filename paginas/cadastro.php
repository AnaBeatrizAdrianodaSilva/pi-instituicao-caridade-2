<?php
    include "../include/functions.php";
    include "../include/MySql.php";

    // variaveis
    $email = $name = $senha = "";
    $emailErr = $nameErr = $senhaErr = $msgErr = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){
        if (empty($_POST['name'])){
            $nameErr = "name é obrigatório!";
        } else {
            $name = test_input($_POST["name"]);
        }
	    if (empty($_POST['email'])){
            $emailErr = "Email é obrigatório!";
        } else {
            $email = test_input($_POST["email"]);
        }
	    if (empty($_POST['senha'])){
            $senhaErr = "Senha é obrigatório!";
        } else {
            $senha = test_input($_POST["senha"]);
        }
        
        // verificar se existe um usuario
        if ($email && $name && $senha){
            $sql = $pdo-> prepare("SELECT * FROM users WHERE email = ?");
            if ($sql->execute(array($email))){
                if ($sql -> rowCount() > 0){
                    $msgErr = "Usuário já cadastrado!";
                }else{
                    $sql = $pdo-> prepare("INSERT INTO users (id_users, nome, email, senha)
                                          values (null, ?,?,?)");
                    if ($sql -> execute(array($name, $email, md5($senha)))){
                        $msgErr = "Dados cadastrados com sucesso!";
                        header('location: login.php');
                    }else{
                        $msgErr = "Dados não cadastrados!";
                    }                     
                }
            }else{
                $msgErr = "Erro no comando SELECT";
            }
        }else{
            $msgErr = "Dados não cadastrados!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>


  <!-- FAVICON -->
  <link rel="shortcut icon" href="../img2/favicon.ico" type="image/x-icon">

  <!-- CSS -->
  <link rel="stylesheet" href="../CSS/StyleCadastro1.css">
  <link rel="stylesheet" href="../CSS/styleHeader.css">
  <link rel="stylesheet" href="CSS/styleFooter.css">

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- font-family: 'Mulish', sans-serif; -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- font-family: 'Work Sans', sans-serif; -->
</head>

<body>

  <!-- <?php
    // require ('../templates/headerResto.php');
?> -->

  <!-- <div class="container"> -->
  <form method="POST" action="" class="form">
    <h1>Cadastro</h1>

    <label for="email">Nome Completo:</label>
    <br>
    <input type="text" name="name" value="<?php echo $name?>">
    <span class="obrigatorio">* <?php echo $nameErr; ?></span>
    <br>

    <label for="senha">Email:</label>
    <br>
    <input type="text" name="email" value="<?php echo $email?>">
    <span class="obrigatorio">* <?php echo $emailErr; ?></span>
    <br>

    <label for="senha">Senha:</label>
    <br>
    <input type="password" name="senha" value="<?php echo $senha?>">
    <span class="obrigatorio">* <?php echo $senhaErr; ?></span>
    <br>
    <br>

    <input class="botao" type="submit" value="Salvar" name="cadastro">
    <span class="obrigatorio"><?php echo $msgErr; ?></span>
    <p>Já uma conta?<a href="login.php">Entre aqui</a></p>
  </form>

  <?php
    require ('../templates/footer.php');
?>

</body>

</html>