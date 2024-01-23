<?php

    namespace Database;
    use PDO;

class DBConnection{

    private $host;
    private $database;
    private $username;
    private $password;
    private $PDO;
    public function __construct(string $host,string $dbname,string $username, string $password)
    {
        $this->host = $host;
        $this->database = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPDO():PDO{

        $dsn = "mysql:host=".$this->host.";dbname=".$this->database;
        return $this->PDO ?? $this->PDO = new PDO($dsn,$this->username,$this->password,
    [
        PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION
        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]
    );

    }
}