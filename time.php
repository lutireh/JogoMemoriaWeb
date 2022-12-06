<?php
$object= json_decode(file_get_contents("php://input"));

$time = $object->{'time'};

print_r($time);
?>