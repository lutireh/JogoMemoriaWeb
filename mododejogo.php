<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    include('protecao.php');
    include('conexao.php');
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/mododejogo.css">
    <script src="./js/game/dimensoes.js" defer></script>
    <script src="./js/game/gamemode.js" defer></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb2d5d7b81.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/tabuleiro.png" type="image/x-icon">
    <title>Modo de Jogo</title>
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
                    <a href="editarPerfil.php">Editar Perfil</a>
                    <a href="historico.php">Histórico</a>
                    <a href="ranking.php">Ranking</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>
            <?php echo ("Logado Como: " . $_SESSION['nome']); ?>
        </div>
    </header>
    <div class="modoJogo">
        <main>
            <form action="" method="post">
                <h1>Jogo da Memória</h1>
                <div class="container">
                    <h2>Modo de Jogo</h2>
                    <div class="row">
                        <div class="radio-container">
                            <label for="classico">
                                <input type="radio" id="classico" name="radio" value="classico" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>Clássico</span>
                            </label>
                        </div>

                        <div class="radio-container">
                            <label for="contraTempo">
                                <input type="radio" id="contraTempo" value="Contra_Tempo" name="radio" data-time />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>Contra o Tempo</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h2>Tamanho do Tabuleiro</h2>
                    <div class="row">
                        <div class="radio-container" id="modoRadio2">
                            <label for="2x2">
                                <input type="radio" id="2x2" name="radio2" value="2x2" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>2x2</span>
                            </label>
                        </div>

                        <div class="radio-container" id="modoRadio4">
                            <label for="4x4">
                                <input type="radio" id="4x4" name="radio2" value="4x4" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>4x4</span>
                            </label>
                        </div>

                        <div class="radio-container" id="modoRadio6">
                            <label for="6x6">
                                <input type="radio" id="6x6" name="radio2" value="6x6" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>6x6</span>
                            </label>
                        </div>
                        <div class="radio-container" id="modoRadio8">
                            <label for="8x8">
                                <input type="radio" id="8x8" name="radio2" value="8x8" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>8x8</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" onclick="clickMe()">Jogar</button>
        </main>
    </div>

    <footer>
        <section>
            <p>Criado por: Pedro Trama Fernandes Pereira, Heloisie Marcelli Santos Silva, Luiza Tirelli Rehbein e Marcelo Teixeira Drumond.</p>
        </section>
    </footer>
</body>

</html>