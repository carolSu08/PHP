<?php

if(isset($_POST['nome'])){
    $nome = $_POST_['nome'];
    $email = $_POST_['email'];
    $senha = $_POST_['senha'];

    $usuario = new Usuario($nome, $senha);
}