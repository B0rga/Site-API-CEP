<?php

    include("banco_conexao.php");

    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $num = $_POST['num'];
    $complemento = $_POST['complemento'];

    $sql = "INSERT INTO usuario(nome, cep, rua, bairro, cidade, estado, num, complemento) 
            VALUES ('$nome', '$cep', '$rua', '$bairro', '$cidade', '$estado', '$num', '$complemento')";

    if(mysqli_query($conexao, $sql)){
        echo "Usuário Cadastrado!";
    }else{
        echo "Erro " .mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);

    header("Location:formulario.html");
    exit;       
?>