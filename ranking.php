<!DOCTYPE html>

<html lang="pt-br">

<head>
    <?php
    include('protecao.php');
    include('conexao.php');
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./style/general.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb2d5d7b81.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/tabuleiro.png" type="image/x-icon">
    <title>Ranking Globlal</title>
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
                    <a href="historico.php">Histórico</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>
            <?php echo ("Logado Como: " . $_SESSION['nome']); ?>
        </div>
    </header>
    <section class="ranking">
        <main>
            <h1>Ranking Global</h1>
            <form action="" method="post">
                <div class="container">
                    <div class="row">
                        <div class="radio-container">
                            <label for="2x2">
                                <input type="radio" id="2x2" name="radio2" value="2x2" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>2x2</span>
                            </label>
                        </div>

                        <div class="radio-container">
                            <label for="4x4">
                                <input type="radio" id="4x4" name="radio2" value="4x4" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>4x4</span>
                            </label>
                        </div>

                        <div class="radio-container">
                            <label for="6x6">
                                <input type="radio" id="6x6" name="radio2" value="6x6" />
                                <div class="custom-radio">
                                    <span class="checkmark"></span>
                                </div>
                                <span>6x6</span>
                            </label>
                        </div>
                        <div class="radio-container">
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
                <div id="gamemode" class="container">
                    <div class="radio-container">
                        <label for="classico">
                            <input type="radio" id="classico" name="radio_modo" value="classico" />
                            <div class="custom-radio">
                                <span class="checkmark"></span>
                            </div>
                            <span>Modo Classico </span>
                        </label>
                    </div>
                    <div class="radio-container">
                        <label for="contraTempo">
                            <input type="radio" id="contraTempo" name="radio_modo" value="contraTempo" />
                            <div class="custom-radio">
                                <span class="checkmark"></span>
                            </div>
                            <span>Modo Contra Tempo</span>
                        </label>
                    </div>
                </div>

                <button type="submit">Listar</button>
            </form>
            <table>
                <?php
                $numero = 1;
                if (isset($_POST['radio2']) and isset($_POST['radio_modo'])) {
                    echo "<br><tr><h3>$_POST[radio2] $_POST[radio_modo]</h3></tr>";
                    if ($_POST['radio_modo'] == 'classico') {
                        $sql_select_ranking = "SELECT nome, tam_tabuleiro, modo_jogo, tempo_partida, pontuacao FROM pessoa pe INNER JOIN partida p ON pe.pessoa_id=p.pessoa_id WHERE tam_tabuleiro = '$_POST[radio2]' AND modo_jogo = 'classico' AND status !='Derrota' ORDER BY tempo_partida ASC LIMIT 10";
                        $result = $pdo->query($sql_select_ranking);
                        if ($result->rowCount() > 0) {
                            echo "<tr><th>Indíce</th><th>Nome do Jogador</th><th>Tam. Tabuleiro</th><th>Modo de Jogo</th><th>Pontuação</th><th>Tempo(Min/Seg/Decimos)</th></tr>";
                            while ($dados = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>$numero</td>";
                                echo "<td>$dados[nome]</td>";
                                echo "<td>$dados[tam_tabuleiro]</td>";
                                echo "<td>$dados[modo_jogo]</td>";
                                echo "<td>$dados[pontuacao]</td>";
                                echo "<td>$dados[tempo_partida]</td>";
                                echo "</tr>";
                                $numero++;
                            }
                        } else
                            echo ("<br><br><h2>Nao Possui Partidas Ainda</h2><br><br>");
                    } else if ($_POST['radio_modo'] == 'contraTempo') {
                        $sql_select_ranking = "SELECT nome, tam_tabuleiro, modo_jogo, tempo_partida, pontuacao FROM pessoa pe INNER JOIN partida p ON pe.pessoa_id=p.pessoa_id WHERE tam_tabuleiro = '$_POST[radio2]' AND modo_jogo = 'contraTempo' AND status !='Derrota' ORDER BY tempo_partida DESC LIMIT 10";
                        $result = $pdo->query($sql_select_ranking);
                        if ($result->rowCount() > 0) {
                            echo "<tr><th>Indíce</th><th>Nome do Jogador</th><th>Tam. Tabuleiro</th><th>Modo de Jogo</th><th>Pontuação</th><th>Tempo Restante(M/S/D)</th></tr>";

                            while ($dados = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>$numero</td>";
                                echo "<td>$dados[nome]</td>";
                                echo "<td>$dados[tam_tabuleiro]</td>";
                                echo "<td>$dados[modo_jogo]</td>";
                                echo "<td>$dados[pontuacao]</td>";
                                echo "<td>$dados[tempo_partida]</td>";
                                echo "</tr>";
                                $numero++;
                            }
                        } else
                            echo ("<br><br><h2>Nao Possui Partidas Ainda</h2><br><br>");

                    }
                } else if (isset($_POST['radio2']) and !isset($_POST['radio_modo'])) {
                    $sql_select_ranking = "SELECT nome, tam_tabuleiro, modo_jogo, tempo_partida, pontuacao FROM pessoa pe INNER JOIN partida p ON pe.pessoa_id=p.pessoa_id WHERE tam_tabuleiro = '$_POST[radio2]' AND status !='Derrota' ORDER BY tempo_partida ASC LIMIT 10";
                    $result = $pdo->query($sql_select_ranking);
                    if ($result->rowCount() > 0) {
                        echo "<tr><th>Indíce</th><th>Nome do Jogador</th><th>Tam. Tabuleiro</th><th>Modo de Jogo</th><th>Pontuação</th><th>Tempo (M/S/D)</th></tr>";

                        while ($dados = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>$numero</td>";
                            echo "<td>$dados[nome]</td>";
                            echo "<td>$dados[tam_tabuleiro]</td>";
                            echo "<td>$dados[modo_jogo]</td>";
                            echo "<td>$dados[pontuacao]</td>";
                            echo "<td>$dados[tempo_partida]</td>";
                            echo "</tr>";
                            $numero++;
                        }
                    } else
                        echo ("<h2>Ainda não possui partidas</h2>");
                }
                ?>
            </table>
        </main>
    </section>
    <footer>
        <section>
            <p>Criado por: Pedro Trama Fernandes Pereira, Heloisie Marcelli Santos Silva, Luiza Tirelli Rehbein e Marcelo Teixeira Drumond.</p>
        </section>
    </footer>
</body>

</html>