<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['pessoa_id'])){
        echo ("Efetue o Login para acessar a Pagina \n");
        die("<a href=\"index.php\"><button>Login</button></a>");
    }
?>
