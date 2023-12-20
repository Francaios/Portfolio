<?php 


class conection{
    private $server="localhost";
    private $username="root";
    private $password="";
    private $conection;

    private $dbname="proyectos";

    public function __construct(){

        try{
            $this->conection= new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->username,$this->password);
            $this->conection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            return "Conection Error".$e;
        }
    }

    public function execute($sql){
        $this->conection->exec($sql);
        return $this->conection->lastInsertId();
    }

    public function request($sql){
        $req = $this->conection->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}






?>