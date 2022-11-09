<?php
    include "../include/functions.php";
    include "../include/MySql.php";

    $msgErro = "";
    $descricao = $NomeInstituicao = $TipoInstituicao = $EmailInstituicao = $cnpj = $tipoInst = $ONGs = $InstituicaoGovernamental = $InstituicaoPrivada = "";
    $nomeErr = $emailErr = $cnpjErr = $senhaErr = $descricaoErr = $tipoInstErr = $ONGsErr = $InstituicaoGovernamentalErr = $InstituicaoPrivadaErr = "";
    $valor = 0;


    if (isset($_POST["cadastro"])){
        if (!empty($_FILES["image"]["name"])){
            //Pegar informações
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            //Permitir somente alguns formatos
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)){
                $image = $_FILES['image']['tmp_name'];
                $imgContent = file_get_contents($image);

                if (isset($_POST['NomeInstituicao'])){
                    $NomeInstituicao = $_POST['NomeInstituicao'];
                } else {
                    $NomeInstituicao = "";
                }
                if (isset($_POST['TipoInstituicao'])){
                    $TipoInstituicao = $_POST['TipoInstituicao'];
                } else {
                    $TipoInstituicao = "";
                }
                if (isset($_POST['EmailInstituicao'])){
                    $EmailInstituicao = $_POST['EmailInstituicao'];
                } else {
                    $EmailInstituicao = "";
                }
                if (isset($_POST['cnpj'])){
                    $cnpj = $_POST['cnpj'];
                } else {
                    $cnpj = "";
                }
                if (isset($_POST['descricao'])){
                    $descricao = $_POST['descricao'];
                } else {
                    $descricao = "";
                }
                if (isset($_POST['tipoInst'])){
                    $tipoInst = $_POST['tipoInst'];
                } else {
                    $tipoInst = "";
                }
              
                //Gravar no banco
                $sql = $pdo->prepare("INSERT INTO cadastinst (NomeInstituicao, TipoInstituicao, EmailInstituicao, cnpj, tipoInst, descricao, imagem)
                                      VALUES (?,?,?,?,?,?,?)");
                if ($sql->execute(array($NomeInstituicao, $TipoInstituicao, $EmailInstituicao, $cnpj, $tipoInst, $descricao, base64_encode($imgContent) ))){
                    $msgErro = "Dados cadastrados com suscesso!";
                    echo $msgErro;
                    die();
                } else {
                    $msgErro = "Dados não cadastrados!";
                    echo $msgErro;
                    die();
                }

            } else {
                $msgErro = "Desculpe, mas somente arquivos JPG, JPEG, PNG e GIF são permitidos";
                echo $msgErro;
                    die();
            }
        } else {
            $msgErro = "Selecione uma imagem para upload";
            echo $msgErro;
                    die();
        }
    }

?>
<?php
    require ('../templates/headerResto.php');
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
    <form method="POST" action="" class="form" enctype="multipart/form-data" >
        <h1>Cadastro da Instituição</h1>

        <label for="email">Nome da Instituição:</label>
        <br>
        <input type="text" name="nome" value="<?php echo $NomeInstituicao?>">
        <span class="obrigatorio">* <?php echo $nomeErr ?></span>
        <br>

        <label for="senha">Email:</label>
        <br>
        <input type="text" name="email" value="<?php echo $EmailInstituicao?>">
        <span class="obrigatorio">* <?php echo $emailErr ?></span>
        <br>
        
        <label for="senha">CNPJ:</label>
        <br>
        <input type="text" name="cpf" value="<?php echo $cnpj?>">
        <span class="obrigatorio">* <?php echo $cnpjErr ?></span>
        <br>
        
        <label for="tipoInst">Tipo de Instituição:</label>
        <br>
        <select name="tipoInst" id="tipoInst">
        <option value="tipoInst" selected>Selecione</option>
            <option value="ONGs">ONGs</option>
            <option value="Instituição Governamental">Instituição Governamental</option>
            <option value="Instituição Privada">Instituição Privada</option>
        </select>
        <span class="obrigatorio">* <?php echo $tipoInstErr ?></span>
        <br>

        <label for="senha">Descrição:</label>
        <br>
        <input type="text" name="senha" value="<?php echo $descricao?>">
        <span class="obrigatorio">* <?php echo $descricaoErr ?></span>
        <br> 
        <br>
        <label for="User">Imagem:</label>
        <input class="botaoImg" type="file" name="image"/>
        <br><br>
        <input class="botao" type="submit" value="Salvar" name="cadastro">
        <span class="obrigatorio"><?php echo $msgErro ?></span>
        <p>Já uma conta?<a href="login.php">Entre aqui</a></p>
    </form>
</body>
</html>
<?php
    require ('../templates/footer.php');
?>