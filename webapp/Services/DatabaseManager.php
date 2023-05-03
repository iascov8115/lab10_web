<?php
namespace Services;
use mysqli;

class DatabaseManager {
    private static array $instances = [];
    public mysqli|bool $connection;
    private string $host;
    private string $dbname;
    private string $username;
    private string $password;
    private function __construct(){
        $this->host = '127.0.0.1';
        $this->dbname = 'crafti_iascov';
        $this->username = 'crafti';
        $this->password = 'craftiPwd!';
        $this->connect();
    }
    public static function getInstance(): DatabaseManager
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
    private function connect(){
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if (!$this->connection) throw new \Exception('Cannot connect to database');
    }

    public function __destruct() {
        $this->connection->close();
    }
}

