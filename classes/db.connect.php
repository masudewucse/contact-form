<?php 

class Database{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function connect(){
        $this->host    = 'localhost';
        $this->db      = 'contact';
        $this->user    = 'root';
        $this->pass    = '';
        $this->charset = 'utf8mb4';

        try{
            $dsn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $pdo = new PDO($dsn,$this->user,$this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo "Connection failed: ".$e.getMessage();
        }
    }

}

    