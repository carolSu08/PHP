<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;    
    private $pdo;
    private $telefone;

    public function __construct(){
        $dns    = "mysql:dbname=usuarioetimpwiii;host=localhost"; 
        $dbUser = "root";
        $dbPass = "";
        
        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);           
            return true;
        } catch (\Throwable $th) {           
            return false;
        }   
    }

    public function cadastrar($nome, $email, $senha, $telefone){
        
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s, telefone = :t";
        
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->bindValue(":t", $telefone);

        return $stmt->execute();
    }

    public function chkUser($email){
        
        $sql = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        if( $stmt->rowCount() > 0 ){
            return true;
        }else{
            return false;
        }    
    }

    public function chkPass($email, $senha){
        
        $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        }else{
            return false;
        }     
    }
}