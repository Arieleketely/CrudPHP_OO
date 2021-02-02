<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'select * from pessoa';

echo '<h3>Pessoas: </h3>';
echo '<head><link rel="stylesheet" type="text/css" href="boostrap/bootstrap.min.css" media="screen" /></head>';
foreach ($pdo->query($sql) as $key => $value) {
  
    echo '<table class="table table-striped" border="1">';
  
    echo  '<tr><td scope="col">Id</td><td scope="col">Telefone</td><td scope="col">Nome</td></tr>';
   echo  '<td scope="col">' . $value['id'] .'</td>';
   
    echo '<td scope="col">'. $value['telefone']  .'</td>';
   echo '<td scope="col">'. $value['nome'] . '</td>';
   echo '<td scope="col">'. '<button type="button" class="btn btn-primary">Cadastrar</button>' . '</td>';
   echo '<td scope="col">'. '<button type="button" class="btn btn-danger">Excluir</button>' . '</td>';
   echo '<td scope="col">'. '<button type="button" class="btn btn-primary">Alterar</button>' . '</td>';
     echo '</table>';
}

