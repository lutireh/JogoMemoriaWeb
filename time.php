<?php
include('protecao.php');
include('conexao.php');
$object= json_decode(file_get_contents("php://input"));
$time = $object->{'time'};

if (isset($time)) {
    $sql_update_time = "UPDATE partida SET tempo_partida = '$time', status = 'Vitoria' WHERE partida_id= (SELECT partida_id FROM partida WHERE pessoa_id = '$_SESSION[pessoa_id]' ORDER BY partida_id DESC LIMIT 1)";
    $pdo->exec($sql_update_time);
}
?>