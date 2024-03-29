<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Mais</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/styleVerMais.css">
    <link rel="stylesheet" href="../CSS/styleHeader.css">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img2/favicon.ico" type="image/x-icon">

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

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class='svg'><path fill="#262DDA" fill-opacity="1" d="M0,64L26.7,90.7C53.3,117,107,171,160,170.7C213.3,171,267,117,320,112C373.3,107,427,149,480,181.3C533.3,213,587,235,640,245.3C693.3,256,747,256,800,240C853.3,224,907,192,960,154.7C1013.3,117,1067,75,1120,53.3C1173.3,32,1227,32,1280,48C1333.3,64,1387,96,1413,112L1440,128L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path></svg>

        <!-- MENU -->

        <nav>
            <a href="./home.php">Home</a>

            <img src="../img2/logo.png" alt="Logo" class='logo'>

            <a href="./verMais.php">Ver Mais</a>
        </nav>

        <div class="hero" id="back">
            <div class="content">
                <!-- <img src="../img2/1.png" alt=""> -->

            </div>
        </div>

    </header>

    <!-- <svg viewBox="0 0 1864 414" fill="none" xmlns="http://www.w3.org/2000/svg" id='onda1'>
        <g clip-path="url(#clip0_22_40)">
            <path d="M0 367.171L62.1333 341.031C124.267 314.401 248.533 262.859 372.8 249.36C497.067 235.861 621.333 262.859 745.6 308.265C869.867 353.671 994.133 419.94 1118.4 412.945C1242.67 406.441 1366.93 327.901 1491.2 282.126C1615.47 235.861 1739.73 223.589 1801.87 216.594L1864 210.089V92.2784H1801.87C1739.73 92.2784 1615.47 92.2784 1491.2 92.2784C1366.93 92.2784 1242.67 92.2784 1118.4 92.2784C994.133 92.2784 869.867 92.2784 745.6 92.2784C621.333 92.2784 497.067 92.2784 372.8 92.2784C248.533 92.2784 124.267 92.2784 62.1333 92.2784H0V367.171Z" fill="#F2D17C"/>
            <path d="M0 126.8L34.5617 155.306C68.9939 183.386 138.506 241.039 207.111 240.719C276.105 241.039 345.617 183.386 414.222 178.048C483.216 172.709 552.728 217.551 621.333 252.036C690.327 285.88 759.839 309.369 828.444 320.366C897.438 331.79 966.95 331.79 1035.56 314.707C1104.55 297.625 1174.06 263.46 1242.67 223.636C1311.67 183.386 1381.17 138.544 1449.78 115.376C1518.78 92.6349 1588.28 92.6349 1656.89 109.717C1725.89 126.8 1795.39 160.965 1829.05 178.048L1864 195.13V58.4705H1829.43C1795 58.4705 1725.49 58.4705 1656.89 58.4705C1587.9 58.4705 1518.38 58.4705 1449.78 58.4705C1380.79 58.4705 1311.27 58.4705 1242.67 58.4705C1173.68 58.4705 1104.16 58.4705 1035.56 58.4705C966.562 58.4705 897.05 58.4705 828.444 58.4705C759.451 58.4705 689.939 58.4705 621.333 58.4705C552.339 58.4705 482.828 58.4705 414.222 58.4705C345.228 58.4705 275.717 58.4705 207.111 58.4705C138.117 58.4705 68.6056 58.4705 34.95 58.4705H0V126.8Z" fill="#E8BA44"/>
            <path d="M0 95.3101L34.5617 110.679C68.9939 125.819 138.506 156.902 207.111 156.73C276.105 156.902 345.617 125.819 414.222 122.94C483.216 120.062 552.728 144.239 621.333 162.831C690.327 181.079 759.839 193.742 828.444 199.671C897.438 205.83 966.95 205.83 1035.56 196.621C1104.55 187.411 1174.06 168.991 1242.67 147.519C1311.67 125.819 1381.17 101.642 1449.78 89.1513C1518.78 76.8903 1588.28 76.8903 1656.89 86.1005C1725.89 95.3101 1795.39 113.731 1829.05 122.94L1864 132.15V58.4705H1829.43C1795 58.4705 1725.49 58.4705 1656.89 58.4705C1587.9 58.4705 1518.38 58.4705 1449.78 58.4705C1380.79 58.4705 1311.27 58.4705 1242.67 58.4705C1173.68 58.4705 1104.16 58.4705 1035.56 58.4705C966.562 58.4705 897.05 58.4705 828.444 58.4705C759.451 58.4705 689.939 58.4705 621.333 58.4705C552.339 58.4705 482.828 58.4705 414.222 58.4705C345.228 58.4705 275.717 58.4705 207.111 58.4705C138.117 58.4705 68.6056 58.4705 34.95 58.4705H0V95.3101Z" fill="#262DDA"/>
            <path d="M0 43.7953L34.5617 37.6732C68.9939 31.6427 138.506 19.2608 207.111 19.3296C276.105 19.2608 345.617 31.6427 414.222 32.7892C483.216 33.9357 552.728 24.3053 621.333 16.8991C690.327 9.63041 759.839 4.58594 828.444 2.2242C897.438 -0.229257 966.95 -0.229257 1035.56 3.43946C1104.55 7.10817 1174.06 14.4456 1242.67 22.9983C1311.67 31.6427 1381.17 41.2731 1449.78 46.2489C1518.78 51.1328 1588.28 51.1328 1656.89 47.4641C1725.89 43.7953 1795.39 36.458 1829.05 32.7892L1864 29.1205V58.4705H1829.43C1795 58.4705 1725.49 58.4705 1656.89 58.4705C1587.9 58.4705 1518.38 58.4705 1449.78 58.4705C1380.79 58.4705 1311.27 58.4705 1242.67 58.4705C1173.68 58.4705 1104.16 58.4705 1035.56 58.4705C966.562 58.4705 897.05 58.4705 828.444 58.4705C759.451 58.4705 689.939 58.4705 621.333 58.4705C552.339 58.4705 482.828 58.4705 414.222 58.4705C345.228 58.4705 275.717 58.4705 207.111 58.4705C138.117 58.4705 68.6056 58.4705 34.95 58.4705H0V43.7953Z" fill="#262DDA"/>
        </g>
        <defs>
            <clipPath id="clip0_22_40">
                <rect width="1864" height="414" fill="white"/>
            </clipPath>
        </defs>
    </svg> -->

    <section class="container">
        <h2>Casa de Repouso</h2>
        
        <section class="categoria">
            <figure>
                <a href="https://www.larzinhochicoxavier.org.br/" target="_blank">
                    <img src="../img2/andreLuiz.png" alt="">
                </a>
                <a href="https://www.larzinhochicoxavier.org.br/" target="_blank"><h2>Lar Casa André Luiz</h1></a>
                <figcaption>
                    <p>O Centro Espírita Nosso Lar Casas André Luiz, foi fundado em 28 de janeiro de 1949. Instituição de caráter filantrópico, sem fins lucrativos que por orientação espiritual optou pelo atendimento gratuito a pessoas com deficiência intelectual.</p>
                </figcaption>
            </figure>

            <figure>
                <a href="https://www.larzinhochicoxavier.org.br/" target="_blank">
                    <img src="../img2/larzinhoChicoXavier.png" alt="">
                </a>

                <a href="https://www.larzinhochicoxavier.org.br/" target="_blank">
                    <h2>Larzinho Chico e Xavier</h2>
                </a>

                <figcaption>
                    <p>
                        A história do Larzinho começou em 1995 e, desde então, já foram mais de 300 crianças acolhidas em nossa casa. Estamos empenhados em dar um suporte individualizado, afetivo e emocional aos acolhidos. Respeitamos e levamos em consideração as histórias de vida de cada criança.
                    </p>
                </figcaption>
            </figure>

            <figure>
                <a href="https://www.grupoacasa.com.br/sobre/" target="_blank">
                    <img src="../img2/ACASA.jpeg" alt="">
                </a>

                <a href="https://www.grupoacasa.com.br/sobre/" target="_blank">
                    <h2>ACASA</h2>
                </a>

                <figcaption>
                    <p>
                        O grupo ACASA surgiu com o intuito de promover o bem a todos os idosos que necessitam de acompanhamento e desejam ter uma boa qualidade de vida.
                        Buscamos entregar o conforto do lar com a infraestrutura que a idade necessita. 
                    </p>
                </figcaption>
            </figure>
        </section>
    </section>



    <section class="container" style="margin-top: 100px;"> <!--STYLE SERVE PARA DAR UM ESPAÇAMENTO MENOR ENTRE OS CONTAINERS -->
        <h2>ONG</h2>
        
        <section class="categoria">
            <figure>
                <a href="https://refugio343.org" target="_blank">
                    <img src="../img2/regugio343.jpeg" alt="">
                </a>

                <a href="https://refugio343.org" target="_blank">
                    <h2>Refúgio 343</h2>
                </a>

                <figcaption>
                    <p>
                        O Refúgio 343 nasceu em resposta ao que é hoje o maior desafio migratório da história do hemisfério ocidental. Somos uma organização humanitária dedicada à reinserção socioeconômica de refugiados e migrantes. 
                    </p>
                </figcaption>
            </figure>

            <figure>
                <a href="https://amparanimal.org.br" target="_blank">
                    <img src="../img2/AMPARA.jpeg" alt="">
                </a>

                <a href="https://amparanimal.org.br" target="_blank">
                    <h2>AMPARA</h2>
                </a>

                <figcaption>
                    <p>
                        A AMPARA é uma OSCIP sem fins lucrativos. Somos protetores de animais abandonados e vítimas de maus-tratos. Lutamos para que os mais de 30 milhões de animais de rua tenham uma vida com respeito e amor.
                    </p>
                </figcaption>
            </figure>

            <figure>
                <a href="https://www.childfundbrasil.org.br" target="_blank">
                    <img src="../img2/childFund.jpeg" alt="">
                </a>

                <a href="https://www.childfundbrasil.org.br" target="_blank">
                    <h2>ChildFund Brasil</h2>
                </a>

                <figcaption>
                    <p>
                        Apoiar o desenvolvimento de crianças em situação de privação, exclusão e vulnerabilidade social, tornando-as capazes de realizar melhorias em suas vidas e dando a elas oportunidade de se tornarem jovens, adultos, pais e líderes que conferirão mudanças sustentáveis e positivas às comunidades.
                    </p>
                </figcaption>
            </figure>
        </section>
    </section>

    <section class="container" style="margin-top: 100px;"> <!--STYLE SERVE PARA DAR UM ESPAÇAMENTO MENOR ENTRE OS CONTAINERS -->
        <h2>Instituições de apoio a pessoas com câncer</h2>
        
        <section class="categoria">
            <figure>
                <a href="https://femama.org.br/site/" target="_blank">
                    <img src="../img2/FEMAMA.jpeg" alt="">
                </a>

                <a href="https://femama.org.br/site/" target="_blank">
                    <h2>FEMAMA</h2>
                </a>

                <figcaption>
                    <p>
                        FEMAMA é uma instituição sem fins lucrativos que tem como principal objetivo reduzir os índices de mortalidade por câncer de mama no país.
                    </p>
                </figcaption>
            </figure>

            <figure>
                <a href="https://www.gapc.org.br" target="_blank">
                    <img src="../img2/GAPC.jpeg" alt="">
                </a>

                <a href="https://www.gapc.org.br" target="_blank">
                    <h2>GAPC</h2>
                </a>

                <figcaption>
                    <p>
                        O Grupo de Apoio a Pessoas com Câncer tem como objetivo ajudar os portadores da doença e sua família também. Sendo assim, eles disponibilizam suplementos alimentares, medicamentos, fraldas, próteses, atendimentos nutricional, psicológico e fisioterapêutico.
                    </p>
                </figcaption>
            </figure>

            <figure>
                <a href="https://www.abrale.org.br" target="_blank">
                    <img src="../img2/ABRALE.jpeg" alt="">
                </a>

                <a href="https://www.abrale.org.br" target="_blank">
                    <h2>Abrale</h2>
                </a>

                <figcaption>
                    <p>
                        A Associação Brasileira de Linfoma e Leucemia trabalha com o objetivo de democratizar o tratamento da doença e, inclusive, melhorar a qualidade de vida das pessoas diagnosticadas com doenças hematológicas.
                    </p>
                </figcaption>
            </figure>
        </section>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
 

    <?php
        require('../templates/footer.php');
    ?>
</body>
</html>
<!-- <?php
    // include "../include/MySql.php";
    // //Depois do FROM, falta o nome do banco de dados 
    // $sql = $pdo->prepare("SELECT * FROM cadastinst ");
    // if ($sql->execute()){
    //     $info = $sql->fetchAll(PDO::FETCH_ASSOC);

    //     foreach($info as $key=>$values){
    //         echo 'Nome: '.$values['NomeInstituicao'].'<br>';
    //         echo 'Endereço Instituicao: '.$values['LinkInstituicao'].'<br>';
    //         echo 'Descrição: '.$values['descricao'].'<br>';
    //         // echo 'Email: '.$values['EmailInstituicao'].'<br>';
    //         echo 'Tipo Instituição: '.$values['tipoInst']. '<br>';

    //         $imagem = $values['imagem'];
    //         echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($imagem).'"/><br>';
    //         echo '<hr>';
    //     }
    // }
?> -->


    <!-- <?php
        // include "../include/MySql.php";
        // Depois do FROM, falta o nome do banco de dados 
        // $sql = $pdo->prepare("SELECT * FROM cadastinst ");
        // if ($sql->execute()){
        //     $info = $sql->fetchAll(PDO::FETCH_ASSOC);

        //     foreach($info as $key=>$values){

        //         echo '<section class="categoria" style="margin-top: 100px;">
        //                 <figure class="a">
        //                     <a href="#" target="_blake">'.
        //                         $image = $values['imagem']
        //                         .'<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($image).'"/>
        //                     </a>
        //                     <figcaption>
        //                         <p>'
        //                             .$values['descricao'].
        //                         '</p>
        //                     </figcaption>
        //                 </figure>

        //             </section>';

        //             echo 'Endereço da Instituição: '.$values['LinkInstituicao'].'<br>';
        //          echo 'Nome: '.$values['NomeInstituicao'].'<br>';
        //         echo 'Email: '.$values['EmailInstituicao'].'<br>';
        //         echo 'Descrição: '.$values['descricao'].'<br>';
        //         echo 'Valor: '.$values['descricao'].'<br>';
        //         echo 'Descrição: '.$values['EmailInstituicao'].'<br>';
        //         echo 'tipoInst: '.$values['tipoInst']. '<br>';

        //         $Imagem = $values['Imagem'];
        //         echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($Imagem).'"/><br>';
        //         echo '<hr>';
        //     }
        // }
?> -->