<?php 

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class connection{
    private $server;
    private $username;
    private $password;
    private $connection;
    private $dbname;

    public function __construct(){
        $this->server = $_ENV['DB_SERVER'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->dbname = $_ENV['DB_NAME'];

        try{
            $this->connection= new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->username,$this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            return "Connection Error".$e;
        }
    }


    public function execute($sql){
        $this->connection->exec($sql);
        return $this->connection->lastInsertId();
    }

    public function request($sql){
        $req = $this->connection->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}






?>