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
    <title>Cadastro</title>

</head>

<body>
    <div class="cadastro">
        <div class="coluna1">
            <header>
                <h2>Jogo da Memória</h2>
            </header>
            <img src="./assets/tabuleiro.png" alt="tabuleiro jogo">
        </div>
        <main>
            <form action="" method="post" name="formularioCadastro" onsubmit="return verificaCamposCadastro()">
                <header>
                    <h2>Cadastre-se</h2>
                </header>
                <div class="nome">
                    <input type="text" name="nome" placeholder="nome completo">
                </div>
                <div class="nascimento">
                    <input type="date" name="nascimento">
                </div>
                <div class="cpf">
                    <input type="text" name="cpf" placeholder="CPF">
                </div>
                <div class="telefone">
                    <input type="text" name="telefone" placeholder="telefone">
                </div>
                <div class="email">
                    <input type="text" name="email" placeholder="email">
                </div>
                <div class="usuario">
                    <input type="text" name="usuario" placeholder="usuario">
                </div>
                <div class="senha">
                    <input type="password" name="senha" placeholder="senha">
                </div>
                <a href="index.php"><button>Cadastrar</button></a>
            </form>
            <?php
                if(isset($_POST['nome']) and isset($_POST['nascimento']) and isset($_POST['cpf']) and isset($_POST['telefone']) and isset($_POST['email']) and isset($_POST['usuario']) and isset($_POST['senha'])){
                    $sql_select_pessoa = "SELECT * FROM pessoa WHERE usuario ='$_POST[usuario]'";
                    $sql_query = $pdo->query($sql_select_pessoa);
                    $dados = $sql_query->fetch(PDO::FETCH_ASSOC);
                    if ($sql_query->rowCount() >= 1) 
                        echo ("<br><br>Usuario Já exixtente, Tente com outro Usuario");
                    else{
                        $sql_insert_pessoa = "INSERT INTO pessoa VALUES(NULL,'$_POST[nome]','$_POST[usuario]','$_POST[senha]','$_POST[nascimento]','$_POST[cpf]','$_POST[telefone]','$_POST[email]')";
                        $pdo->exec($sql_insert_pessoa);
                        echo("<br><br>Usuario Cadastrado!<br><br>");
                        echo "<a href=index.php><button>Login</button></a>";
                    }
                }    
            ?>
        </main>
    </div>
    <footer>
        <section>
            <p>Criado por: Pedro Trama Fernandes Pereira, Heloisie Marcelli Santos Silva, Luiza Tirelli Rehbein e Marcelo Teixeira Drumond.</p>
        </section>
    </footer>
</body>

</html>