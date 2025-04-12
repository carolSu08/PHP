<?php
class usuario{
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function _construct(){
        $dns = "mysql:dbname=usuariopwii;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dns, $dbUser, $dbpPass);
            return true;
        } catch (/Throwable $th){
            return false;
        }
    }

    public function cadastrar ($nome, $email, $senha){
        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";
        $stmt = $this-> pdo ->prepare($sql);

        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        return $stmt->executive();

    }

    public function chkpass($email, $senha){

        $sql = "SELECT * FROM usuario WHERE email = :e AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        $stmt->execute();

        if($stmt->rowCount()> 0){
            return $stmt>fecth();
        }else{
            return false;
        }

    }
}