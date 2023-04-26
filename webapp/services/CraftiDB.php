<?php
namespace services;
use mysqli;

class CraftiDB {
    private mysqli|bool $connection;
    private string $host;
    private string $dbname;
    private string $username;
    private string $password;
    public function __construct(){
        $this->host = '127.0.0.1';
        $this->dbname = 'crafti';
        $this->username = 'crafti';
        $this->password = 'craftiPwd!';
        $this->connect();
    }
    private function connect(){
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if (!$this->connection) throw new \Exception('Cannot connect to database');
    }
    public function getEvents(){
        $query = "select e.event_name, e.event_location, e.event_price, m.manager_login, e.event_id from event e inner join manager m on e.manager_id = m.manager_id";
        return $this->connection->query($query)->fetch_all();
    }
    public function getEventById($id) {
        $query = "select e.event_name from event e where e.event_id = {$id}";
        return $this->connection->query($query)->fetch_assoc();
    }
    public function addNewParentRecord($name, $email){
        $query = "INSERT into parent(parent_name, parent_email) values('{$name}', '{$email}')";
        $this->connection->query($query);
    }
    public function addNewChildRecord($name, $year, $id){
        $query = "INSERT into child(child_name, child_birth, parent_id) values('{$name}', '{$year}', {$id})";
        $this->connection->query($query);
    }
    public function getChildByNameAndYearAndParentId($name, $year, $id) {
        $query = "SELECT child_id from child where child_name = '{$name}' and child_birth = '{$year}' and parent_id = {$id}";
        return $this->connection->query($query)->fetch_assoc();
    }
    public function getParentByNameAndEmail($name, $email){
        $query = "SELECT parent_id from parent where parent_name='{$name}' and parent_email = '{$email}'";
        return $this->connection->query($query)->fetch_assoc();
    }
    public function addNewEventRecord() {
    }
}

