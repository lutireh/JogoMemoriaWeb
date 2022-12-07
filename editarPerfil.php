<!DOCTYPE html>

<html lang="pt-br">

<head>
    <?php
    include('protecao.php');
    include('conexao.php');
    ?>
    <meta charset="UTF-8">
    <link href="./style/general.css" rel="stylesheet">
    <link href="./style/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb2d5d7b81.js" crossorigin="anonymous"></script>
    <script src="./js/auth/controle.js" defer></script>
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
            <?php echo ("Logado Como: " . $_SESSION['nome']); ?>
        </div>
    </header>
    <div class="editarPerfil">
        <main>
            <?php
            if (isset($_POST['nome']) and isset($_POST['telefone']) and isset($_POST['email']) and isset($_POST['senha']) and isset($_POST['usuario'])) {
                $sql_select_pessoa = "SELECT * FROM pessoa WHERE usuario ='$_POST[usuario]'";
                $sql_query = $pdo->query($sql_select_pessoa);
                $dados = $sql_query->fetch(PDO::FETCH_ASSOC);
                if ($sql_query->rowCount() >= 1)
                    echo ("<h3>Usuario ja existente, por favor mude</h3>");
                else {
                    $sql_update_pessoa = "UPDATE pessoa SET nome = '$_POST[nome]', usuario = '$_POST[usuario]', senha = '$_POST[senha]', telefone = '$_POST[telefone]', email='$_POST[email]' WHERE pessoa_id = '$_SESSION[pessoa_id]'";
                    $result = $pdo->query($sql_update_pessoa);
                    header('Location: index.php');
                }
            }
            ?>
            <form action="editarPerfil.php" method="POST" name="formularioEditaPerfil">
                <header>
                    <h2>Editar Perfil</h2>
                </header>
                <div class="nome">
                    <input type="text" name="nome" id="nome" required placeholder="nome completo">
                </div>
                <div class="telefone">
                    <input type="text" name="telefone" id="telefone" required placeholder="telefone">
                </div>
                <div class="email">
                    <input type="text" name="email" id="email" required placeholder="email">
                </div>
                <div class="usuario">
                    <input type="password" name="usuario" id="usuario" required placeholder="usuario">
                </div>
                <div class="senha">
                    <input type="password" name="senha" id="senha" required placeholder="senha">
                </div>
                <button type="submit">Salvar</button>

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