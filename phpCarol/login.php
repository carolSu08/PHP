<?php
require 'usuario.php';

$sucesso = $usuario = new Usuario();
if ($sucesso){
    $ff = $usuario->chkUser("caroline.sena@gmail.com");

    if( $sucesso ){
        $user = $usuario->cadastrar("Caroline Suzart","caroline@gmail.com","12121212","119999999");
        echo "<h1> cadastrado com sucesso";
    }else{
        echo"<h1> usuario ja existe";
    }
}else{
    echo"<h1> ERRO ao conectar com o banco de dados ";
}
echo"</h1>";