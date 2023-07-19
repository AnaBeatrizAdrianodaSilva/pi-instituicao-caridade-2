<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
</head>
<body>
    <?php
    session_start();
    // Verifica se o nome do usuário está armazenado na sessão
    if (isset($_SESSION['nome'])) {
        $nomeUsuario = $_SESSION['nome']; // Alterado de $_SESSION['nomeUsuario'] para $_SESSION['nome']
        echo "<h1>Olá, $nomeUsuario!</h1>";
    } else {
      echo 'ERRO';
    }
    ?>
    <!-- Conteúdo adicional da página -->
</body>
</html>
