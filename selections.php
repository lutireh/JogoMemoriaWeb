<?php
$body = file_get_contents("php://input");

print_r($body);

$line=$body."\n";

$file= fopen("file.txt",'a+');

fwrite($file,$line);

fclose($file);
?>