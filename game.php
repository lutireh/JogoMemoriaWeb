<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('protecao.php'); ?>
    <meta charset="UTF-8">
    <link href="./style/general.css" rel="stylesheet">
    <link href="./style/game.css" rel="stylesheet">
    <script src="./js/game/game.js" defer></script>
    <script src="./js/game/timer.js" defer></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb2d5d7b81.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/tabuleiro.png" type="image/x-icon">
    <title>Jogo</title>
</head>

<body>
    <header>
        <div>
            <a href="javascript:window.history.go(-1)">
                <i class="fa-solid fa-angles-left"></i>
            </a>
            <div class="dropdown">
                <i id="dropbtn" class="fa-solid fa-bars"></i>
                <div class="dropdown-content">
                    <a href="mododejogo.php">Modo de Jogo</a>
                    <a href="editarPerfil.php">Editar Perfil</a>
                    <a href="historico.php">Histórico</a>
                    <a href="ranking.php">Ranking</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>
            <?php echo ("Logado Como: ".$_SESSION['nome']); ?>
        </div>
        <p class="timer" id="timer">00:00</p>
        <div class="links">
            <span class="icones">Trapaça</span>
            <i class="fa-solid fa-skull fa-2x margin-top" id="cheat"></i>
        </div>
    </header>
    <main>

    </main>
    <footer>
        <section>
            <p>Criado por: Pedro Trama Fernandes Pereira, Heloisie Marcelli Santos Silva, Luiza Tirelli Rehbein e
                Marcelo Teixeira Drumond.</p>
        </section>
    </footer>
</body>

</html>