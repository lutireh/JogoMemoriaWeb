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
    <title>Histórico</title>
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
                    <a href="editarPerfil.php">Editar Perfil</a>
                    <a href="ranking.php">Ranking</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>
            <?php echo ("Logado Como: ".$_SESSION['nome']); ?>
        </div>
    </header>
    <div class="historico">
        <main>
            <header>
                <h1>Histórico de Partidas</h1>
            </header>
            <table>
                <tr>
                    <th>Nome do Jogador</th>
                    <th>Tam. Tabuleiro</th>
                    <th>Modo de Jogo</th>
                    <th>Tempo</th>
                    <th>Resultado</th>
                </tr>
                <tr>
                    <td>Marcelo Drumond</td>
                    <td>4x4</td>
                    <td>Clássico</td>
                    <td>2m34s</td>
                    <td>Vitória</td>
                </tr>
                <tr>
                    <td>Marcelo Drumond</td>
                    <td>4x4</td>
                    <td>Clássico</td>
                    <td>2m34s</td>
                    <td>Vitória</td>
                </tr>
                <tr>
                    <td>Marcelo Drumond</td>
                    <td>4x4</td>
                    <td>Clássico</td>
                    <td>2m34s</td>
                    <td>Vitória</td>
                </tr>
                <tr>
                    <td>Marcelo Drumond</td>
                    <td>4x4</td>
                    <td>Clássico</td>
                    <td>2m34s</td>
                    <td>Vitória</td>
                </tr>
                <tr>
                    <td>Marcelo Drumond</td>
                    <td>4x4</td>
                    <td>Clássico</td>
                    <td>2m34s</td>
                    <td>Vitória</td>
                </tr>
            </table>
        </main>
    </div>
    <footer>
        <section>
            <p>Criado por: Pedro Trama Fernandes Pereira, Heloisie Marcelli Santos Silva, Luiza Tirelli Rehbein e Marcelo Teixeira Drumond.</p>
        </section>
    </footer>
</body>

</html>