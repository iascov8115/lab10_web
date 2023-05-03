<?php

namespace Repository;

use Services\DatabaseManager;

class ParentRepository
{
    public function findOneById($id) {
        $dm = DatabaseManager::getInstance();
        $query = "select *  from parent where parent_id = '{$id}'";
        return $dm->connection->query($query)->fetch_assoc();
    }
    public function findOneByNameEmail(string $name, string $email) {
        $dm = DatabaseManager::getInstance();
        $query = "select *  from parent where parent_email = '{$email}' and parent_name = '{$name}'";
        return $dm->connection->query($query)->fetch_assoc();
    }

    public function add(string $name, string $email)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into parent(parent_name, parent_email) values ('{$name}', '{$email}')";
        $dm->connection->query($query);
        return $this->findOneByNameEmail($name, $email);
    }
    public function findAll(){
        $dm = DatabaseManager::getInstance();
        $query = "select * from parent";
        return $dm->connection->query($query)->fetch_all();
    }

    public function update(int $id, string $parent_name, string $parent_email)
    {
        $dm = DatabaseManager::getInstance();
        $query = "update parent set parent_name = '{$parent_name}', parent_email = '{$parent_email}' where parent_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function delete(int $id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "delete from parent where parent_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function insert(string $parent_name, string $parent_email)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into parent(parent_name, parent_email) values('{$parent_name}','{$parent_email}')";
        $dm->connection->query($query);
    }
}