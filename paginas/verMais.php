<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Mais</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/styleVerMais.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img2/favicon.ico" type="image/x-icon">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- font-family: 'Mulish', sans-serif; -->
</head>
<body>
    <?php   
        require('../templates/header.php');
    ?>

    

    <?php
        require('../templates/footer.php');
    ?>
</body>
</html>
<?php
    //Depois do FROM, falta o nome do banco de dados 
    $sql = $pdo->prepare("SELECT * FROM ");
    if ($sql->execute()){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($info as $key=>$values){
            echo 'Codigo: '.$values['NomeInstituicao'].'<br>';
            echo 'Nome: '.$values['TipoInstituicao'].'<br>';
            echo 'Descrição: '.$values['EmailInstituicao'].'<br>';
            echo 'Valor: '.$values['descricao'].'<br>';
            
            $Imagem = $values['Imagem'];
            echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($Imagem).'"/><br>';
            echo '<hr>';
        }
    }
?>