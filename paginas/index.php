<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">     
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img2/favicon.ico" type="image/x-icon">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">

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

    <!-- essa linha abaixo é para botar no header quando tiver pronto -->
    <!-- Você é admin? <?php //if ($_SESSION['administrador']==1) echo "<a href='cadInst.php'>Cadastre sua Instiuição</a>"; else echo "Não";?> -->
    <!-- hero section start -->
    <div class="hero" id="back">
        <div class="content">

        </div>
    </div>
    <!-- About section start -->
    <section id="sla" class="about">
        <div class="main">
            <img src="/main.jpg" alt="">
            <div class="about-text">
            <h2>Instituição</h2>
                <h5>Descriçao</h5>
                <p> 
                    Eu sou um estudante do ensino médio, estudo no Senac joinville, tenho atualmente
                    17 anos estou cursando o ensino médio integrado com o o técnico de Informática,
                    estou aprendendo a mexer com o front-end e com o back-end, porem quero ser um 
                    fullstack em python, pois é uma area que acho que se desenvolvera melhor e ainda
                    poderia trabalhar com front-end que acho muito legal.
                </p>
                <h5>email@email.empresa.com</h5>
            </div>
        </div>
    </section>

    <section id="sla" class="about-1">
        <div class="main1">
            <div class="about1-text">
                <h2>Instituição</h2>
                <h5>Descriçao</h5>
                <p> 
                    Eu sou um estudante do ensino médio, estudo no Senac joinville, tenho atualmente
                    17 anos estou cursando o ensino médio integrado com o o técnico de Informática,
                    estou aprendendo a mexer com o front-end e com o back-end, porem quero ser um 
                    fullstack em python, pois é uma area que acho que se desenvolvera melhor e ainda
                    poderia trabalhar com front-end que acho muito legal.
                </p>
                <h5>email@email.empresa.com</h5>
            </div>
            <img src="/main.jpg" alt="">
        </div>
    </section>

    <?php
        require('../templates/footer.php');
    ?>

    <script src="https://kit.fontawesome.com/0e715a9c13.js" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
</body>
</html>