<?php
    include "../include/functions.php";
    include "../include/MySql.php";

    $msgErro = "";
    $codInst = $descricao = $NomeInstituicao = $LinkInstituicao= $EmailInstituicao = $cnpj = $tipoInst = $ONGs = $InstituicaoGovernamental = $InstituicaoPrivada = $imagem = "";
    $nomeErr = $LinkInstituicaoErr = $emailErr = $cnpjErr = $senhaErr = $descricaoErr = $tipoInstErr = $ONGsErr = $InstituicaoGovernamentalErr = $InstituicaoPrivadaErr = $imagemErr  = "";
    $valor = 0;


    if (isset($_POST["cadastro"])){
        if (!empty($_FILES["imagem"]["name"])){
            // Pegar informações
            $fileName = basename($_FILES["imagem"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            // Permitir somente alguns formatos
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            if (in_array($fileType, $allowTypes)){
                $imagem = $_FILES['imagem']['tmp_name'];
                $imgContent = file_get_contents($imagem);

                // 1
                if (isset($_POST['NomeInstituicao'])){
                    $NomeInstituicao = $_POST['NomeInstituicao'];
                } else {
                    $NomeInstituicao = "";
                }
                if (isset($_POST['LinklInstituicao'])){
                    $LinkInstituicao = $_POST['LinkInstituicao'];
                } else {
                    $LinkInstituicao = "";
                }
                if (isset($_POST['EmailInstituicao'])){
                    $EmailInstituicao = $_POST['EmailInstituicao'];
                } else {
                    $EmailInstituicao = "";
                }

                // 4
                if (isset($_POST['cnpj'])){
                    $cnpj = $_POST['cnpj'];
                } else {
                    $cnpj = "";
                }

                // 5
                if (isset($_POST['descricao'])){
                    $descricao = $_POST['descricao'];
                } else {
                    $descricao = "";
                }

                // 6
                if (isset($_POST['tipoInst'])){
                    $tipoInst = $_POST['tipoInst'];
                } else {
                    $tipoInst = "";
                }
                // 7
                if (isset($_POST['imagem'])){
                    $imagem = $_POST['imagem'];
                } else {
                    $imagem = "";
                }
                // talvez ta faltando a img
              
                // Gravar no banco
                $sql = $pdo->prepare("INSERT INTO cadastinst (NomeInstituicao, LinkInstituicao, EmailInstituicao, cnpj, tipoInst, descricao, imagem)
                                      VALUES (?,?,?,?,?,?,?");
                if ($sql->execute(array($NomeInstituicao, $LinkInstituicao, $EmailInstituicao, $cnpj, $tipoInst, $descricao, base64_encode($imgContent)))){
                    $msgErro = "Dados cadastrados com sucesso!";
                    header('location: verMais.php');
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
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Instituições</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img2/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/StyleCadastro.css"> 
    <link rel="stylesheet" href="../CSS/styleHeader.css">
    <link rel="stylesheet" href="CSS/styleFooter.css">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font-family: 'Mulish', sans-serif; -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font-family: 'Work Sans', sans-serif; -->
</head>

<body>

<!-- <?php
    // require ('../templates/headerResto.php');
?> -->
    <!-- <div class="container"> -->
    <form method="POST" action="" class="form" enctype="multipart/form-data" >
        <h1>Cadastro da Instituição</h1>

        <label for="email">Nome da Instituição:</label>
        <br>
        <input type="text" name="NomeInstituicao" value="<?php echo $NomeInstituicao?>">
        <span class="obrigatorio">* <?php echo $nomeErr ?></span>
        <br>

        <label for="LinkInstituicao">Endereço da Instituição (Link):</label>
        <br>
        <input type="text" name="LinkInstituicao" value="<?php echo $LinkInstituicao?>">
        <span class="obrigatorio">* <?php echo $LinkInstituicaoErr ?></span>
        <br>


        <!-- <input type="text" name="LinkInstituicao" value="<?php echo $NomeInstituicao?>">
        <span class="obrigatorio">* <?php echo $nomeErr ?></span>
        <br> -->

        <label for="senha">Email:</label>
        <br>
        <input type="text" name="EmailInstituicao" value="<?php echo $EmailInstituicao?>">
        <span class="obrigatorio">* <?php echo $emailErr ?></span>
        <br>
        
        <label for="senha">CNPJ:</label>
        <br>
        <input type="text" name="cnpj" value="<?php echo $cnpj?>">
        <span class="obrigatorio">* <?php echo $cnpjErr ?></span>
        <br>
    
        <label for="tipoInst">Tipo de Instituição:</label>
        <br>
        <input type="text" name="tipoInst" id="tipoInst">

        <!-- <select name="tipoInst" id="tipoInst">
        <option value="tipoInst" selected>Selecione</option>
            <option value="ONGs">ONGs</option>
            <option value="Instituição Governamental">Instituição Governamental</option>
            <option value="Instituição Privada">Instituição Privada</option>
        </select>
        <span class="obrigatorio">* <?php echo $tipoInstErr ?></span>
        <br>
        <br>
        <br> -->
        <br>

        <label for="senha" id="descricao">Descrição:</label>
        <br>
        <input type="text" name="descricao" value="<?php echo $descricao?>">
        <span class="obrigatorio">* <?php echo $descricaoErr ?></span>
        <br> 
        <br>
        <label for="User">Imagem:</label>
        <input class="botaoImg" type="file" name="imagem"/>
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