<?php

namespace Repository;

use Services\DatabaseManager;

class ChildRepository
{
    public function findOneById($id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "select *  from child where child_id = '{$id}'";
        return $dm->connection->query($query)->fetch_assoc();
    }

    public function findOneChildByNameYearParent(string $name, int $year, int $parent_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "select *  from child where child_name = '{$name}' and parent_id = '{$parent_id}' and child_year_of_birth = '{$year}'";
        return $dm->connection->query($query)->fetch_assoc();
    }

    public function addNewChild(string $child_name, int $date, int $parent_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into child(child_name, child_year_of_birth, parent_id) values ('{$child_name}', '{$date}', '$parent_id')";
        $dm->connection->query($query);
        return $this->findOneChildByNameYearParent($child_name, $date, $parent_id);
    }
    public function findAll(){
        $dm = DatabaseManager::getInstance();
        $query = "select * from child";
        return $dm->connection->query($query)->fetch_all();
    }

    public function update(int $id, string $child_name, int $child_year_of_birth, int $parent_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "update child set child_name = '{$child_name}', child_year_of_birth='{$child_year_of_birth}', parent_id = '{$parent_id}' where child_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function delete(int $id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "delete from child where child_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function insert(string $child_name, int $child_year_of_birth, int $parent_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into child(child_name, child_year_of_birth, parent_id) values('{$child_name}','{$child_year_of_birth}','{$parent_id}')";
        $dm->connection->query($query);
    }

}