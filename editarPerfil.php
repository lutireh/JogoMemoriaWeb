<!DOCTYPE html>

<html lang="pt-br">

<head>
    <?php include('protecao.php'); ?>
    <meta charset="UTF-8">
    <link href="./style/general.css" rel="stylesheet">
    <link href="./style/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb2d5d7b81.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/tabuleiro.png" type="image/x-icon">
    <title>Editar Perfil</title>
</head>

<body>
    <header>
        <div class="menu">
            <a href="javascript:window.history.go(-1)">
                <i class="fa-solid fa-angles-left"></i>
            </a>
            <div class="dropdown">
                <i id="dropbtn" class="fa-solid fa-bars"></i>
                <div class="dropdown-content">
                    <a href="mododejogo.php">Modo de Jogo</a>
                    <a href="ranking.php">Ranking</a>
                    <a href="historico.php">Histórico</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>
            <?php echo ("Logado Como: ".$_SESSION['nome']); ?>
        </div>
    </header>
    <div class="editarPerfil">
        <main>
            <form action="post">
                <header>
                    <h2>Editar Perfil</h2>
                </header>
                <div class="nome">
                    <input type="text" name="nome" placeholder="nome completo">
                </div>
                <div class="telefone">
                    <input type="text" name="telefone" placeholder="telefone">
                </div>
                <div class="email">
                    <input type="text" name="email" placeholder="email">
                </div>
                <div class="senha">
                    <input type="password" name="senha" placeholder="senha">
                </div>
                <div class="botao">
                    <button href="javascript:window.history.go(-1)" type="button">Confirmar</button>
                </div>
            </form>

        </main>
    </div>
    <footer>
        <section>
            <p>Criado por: Pedro Trama Fernandes Pereira, Heloisie Marcelli Santos Silva, Luiza Tirelli Rehbein e Marcelo Teixeira Drumond.</p>
        </section>
    </footer>
</body>

</html>