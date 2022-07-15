<?php
    // conexão com o banco de dados 
    $dbHost = 'localhost'; 
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'musicas_aplicacao';

    // variavel que faz a conexao
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    /*
    //fazendo teste para verificar a conexão

    if($conexao->connect_errno){
        echo "Erro";
    }
    else{
        echo "Conexão foi um sucesso!";
    } //
    */
?>