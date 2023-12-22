<?php


class Connection {
    private $host;
    private $username;
    private $password;
    private $connection;
    private $dbname;
    private $port;

    public function __construct(){
        $this->host = $_ENV['MYSQLHOST'];
        $this->username = $_ENV['MYSQL_USER'];
        $this->password = $_ENV['MYSQL_PASSWORD'];
        $this->dbname = $_ENV['MYSQL_DATABASE'];
        $this->port = $_ENV['MYSQL_PORT'];

        try {
            $dsn = "mysql://root:aBahCHbdGb4dhcHbd5335caaH2FC5e3a@roundhouse.proxy.rlwy.net:54331/railway";
            
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
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
