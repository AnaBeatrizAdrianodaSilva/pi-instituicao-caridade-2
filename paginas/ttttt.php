<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">     
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img2/favicon.ico" type="image/x-icon">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/styleHeader.css">

    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">

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
        // require('../templates/header.php');
    ?> -->

    <header class='cabeca'>


        <!-- MENU -->

        <nav>
            <a href="./home.php">Home</a>

            <img src="../img2/logo.png" alt="Logo" class='logo'>

            <a href="./User.php">User</a>
        </nav>

    </header>

    <!-- essa linha abaixo é para botar no header quando tiver pronto -->
    <!-- Você é admin? <?php //if ($_SESSION['administrador']==1) echo "<a href='cadInst.php'>Cadastre sua Instiuição</a>"; else echo "Não";?> -->
    <!-- hero section start -->
    <div class="hero bannerRoxo" id="back">
        <div class="content">

        </div>
    </div>
    <!-- About section start -->
    <section id="sla" class="about aboutFirst">
        <div class="main">
            <img src="../img2/regugio343.jpeg" alt="">
            <div class="about-text">
            <h2>Refúgio 343</h2>
                <p> 
                    O Refúgio 343 nasceu em resposta ao que é hoje o maior desafio migratório da história do hemisfério ocidental. Somos uma organização humanitária dedicada à reinserção socioeconômica de refugiados e migrantes.
                </p>
            </div>
        </div>
    </section>

    <section id="sla" class="about-1">
        <div class="main1">
            <div class="about1-text">
                <h2>FEMAMA</h2>
                <p> 
                    FEMAMA é uma instituição sem fins lucrativos que tem como principal objetivo reduzir os índices de mortalidade por câncer de mama no país.
                </p>
            </div>
            <img src="../img2/FEMAMA.jpeg" alt="">
        </div>
    </section>

    <section id="sla" class="about">
        <div class="main">
            <img src="../img2/ACASA.jpeg" alt="">
            <div class="about-text">
            <h2>ACASA</h2>
                <p> 
                    O grupo ACASA surgiu com o intuito de promover o bem a todos os idosos que necessitam de acompanhamento e desejam ter uma boa qualidade de vida. Buscamos entregar o conforto do lar com a infraestrutura que a idade necessita.


                </p>
            </div>
        </div>
    </section> 

    <section id="sla" class="about-1">
        <div class="main1">
            <div class="about1-text">
                <h2>Abrale</h2>
                <p> 
                    A Associação Brasileira de Linfoma e Leucemia trabalha com o objetivo de democratizar o tratamento da doença e, inclusive, melhorar a qualidade de vida das pessoas diagnosticadas com doenças hematológicas.
                </p>
            </div>
            <img src="../img2/ABRALE.jpeg" alt="">
        </div>
    </section>

    <section id="sla" class="about">
        <div class="main">
            <img src="../img2/logo_larzinho.png" alt="">
            <div class="about-text">
            <h2>Larzinho Chico e Xavier</h2>
                <p> 
                    A história do Larzinho começou em 1995 e, desde então, já foram mais de 300 crianças acolhidas em nossa casa. Estamos empenhados em dar um suporte individualizado, afetivo e emocional aos acolhidos. Respeitamos e levamos em consideração as histórias de vida de cada criança.
                </p>
            </div>
        </div>
    </section> 

    <!-- <?php
        // require('../templates/footer.php');
    ?> -->

    <script src="https://kit.fontawesome.com/0e715a9c13.js" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
</body>
</html>