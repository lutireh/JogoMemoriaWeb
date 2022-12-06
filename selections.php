<?php
include('conexao.php');
include('protecao.php');
$object= json_decode(file_get_contents("php://input"));

$tam_tabuleiro = $object->{'selectedGame'};

$modo_jogo = $object->{'selectedSize'};

if(isset($tam_tabuleiro) and isset($modo_jogo)){
    $sql_insert_partida = "INSERT INTO partida VALUES ('$_SESSION[pessoa_id]',NULL,'$tam_tabuleiro','$modo_jogo','00:00:39')";
    $pdo->query($sql_insert_partida);
}
?>