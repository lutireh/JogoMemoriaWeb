<?php
$server = "localhost";
$usuario = "root";
$senha = "";

try {
    $pdo = new PDO("mysql:host=$server; dbname=Trabalho_Web_noite", "$usuario", "$senha");
    $pdo-> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} 
catch (PDOException $e) {
    $pdo = new PDO("mysql:host=$server", "$usuario", "$senha");
    $sql_code = "CREATE DATABASE Trabalho_Web_noite";
    $result = $pdo->exec($sql_code);
    $pdo = null;
    if($result==1){
        $pdo = new PDO("mysql:host=$server; dbname=Trabalho_Web_noite", "$usuario", "$senha");
        $sql_create_table_pessoa = "CREATE TABLE Pessoa( pessoa_id int AUTO_INCREMENT, nome varchar(50), usuario varchar(50), senha varchar(50), data_nascimento varchar(10), cpf varchar(11), telefone varchar(12), email varchar(50), PRIMARY KEY (pessoa_id) )";
        $sql_create_table_partida = "CREATE TABLE partida( pessoa_id int, partida_id int AUTO_INCREMENT, modo_jogo varchar(15), tam_tabuleiro varchar(3), tempo_partida time NULL, pontuacao int NULL, status varchar(10) NULL,data varchar(20), PRIMARY KEY (partida_id) )";
        $pdo->exec($sql_create_table_pessoa);
        $pdo->exec($sql_create_table_partida);
    }
}
?>