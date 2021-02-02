<?php
session_start();
include_once 'connect.php';

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendCadCont = filter_input(INPUT_POST, 'SendCadCont', FILTER_SANITIZE_STRING);
if($SendCadCont){
    //Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

    
    //Inserir no BD
    $result_msg_cont = "INSERT INTO pessoa (nome, telefone) VALUES (:nome, :telefone)";
    
    $insert_msg_cont = $pdo->prepare($result_msg_cont);
    $insert_msg_cont->bindParam(':nome', $nome);
    $insert_msg_cont->bindParam(':telefone', $telefone);

    if($insert_msg_cont->execute()){
        $_SESSION['msg'] = "<p style='color:green;'>Mensagem enviada com sucesso</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Mensagem não foi enviada com sucesso</p>";
        header("Location: index.php");
    }    
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Mensagem não foi enviada com sucesso</p>";
    header("Location: index.php");
}
//codigo retirado do canal Celke assista la de seu like curta e compatilhe