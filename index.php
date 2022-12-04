<!DOCTYPE html>

<html lang="pt-br">

<head>
    <?php
        include('conexao.php');    
    ?>
    <meta charset="UTF-8">
    <link href="./style/general.css" rel="stylesheet">
    <link href="./style/style.css" rel="stylesheet">
    <script src="./js/auth/controle.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb2d5d7b81.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./assets/tabuleiro.png" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <div class="coluna1">
            <header>
                <h2>Jogo da Memória</h2>
            </header>
            <img src="./assets/tabuleiro.png" alt="tabuleiro jogo">
        </div>
        <main>
        <?php
            if(isset($_POST['usuario']) and isset($_POST['senha'])){
                $sql_select_pessoa = "SELECT * FROM pessoa WHERE usuario ='$_POST[usuario]' AND senha='$_POST[senha]'";
                $sql_query = $pdo->query($sql_select_pessoa);
                $dados = $sql_query->fetch(PDO::FETCH_ASSOC);
                if($sql_query->rowCount()>=1){
                    if(!isset($_SESSION)){
                        session_start();
                        $_SESSION['pessoa_id'] = $dados['pessoa_id'];
                        $_SESSION['nome'] = $dados['nome'];
                    }
                    header('Location: mododejogo.php');
                }
                else
                    echo ("usuario ou senha incorretos");
            }
        ?>
            <form action="index.php" method="POST" name="formularioLogin" onsubmit="return verificaCamposLogin()">
                <header>
                    <h2>Login</h2>
                </header>
                <div class="usuario">
                    <input type="text" name="usuario" id="usuario" placeholder="usuário">
                </div>
                <div class="senha">
                    <input type="password" name="senha" id="senha" placeholder="senha">
                </div>
                <button type="submit" id="loginButton">Entrar</button>
            </form>
            <div class="forgot">
                <span>Não tem conta? <a href="cadastro.php">Cadastre-se</a></span>
            </div>

        </main>

    </div>
    <footer>
        <section>
            <p>Criado por: Pedro Trama Fernandes Pereira, Heloisie Marcelli Santos Silva, Luiza Tirelli Rehbein e Marcelo Teixeira Drumond.</p>
        </section>
    </footer>
</body>

</html>