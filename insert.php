<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'insert into pessoa(nome,telefone) values(?,?)';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['nome']);
$prepare->execute();
$prepare->bindParam(2, $_GET['telefone']);
$prepare->execute();
echo $prepare->rowCount();