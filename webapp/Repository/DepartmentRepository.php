<?php

namespace Repository;

use Services\DatabaseManager;

class DepartmentRepository
{
    public function findAll()
    {
        $dm = DatabaseManager::getInstance();
        $query = "select * from department";
        return $dm->connection->query($query)->fetch_all();
    }

    public function findOneById($id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "select *  from department where department_id = '{$id}'";
        return $dm->connection->query($query)->fetch_assoc();
    }

    public function update(int $id, string $department_address, string $department_phone)
    {
        $dm = DatabaseManager::getInstance();
        $query = "update department set department_address = '{$department_address}', department_phone = '{$department_phone}' where department_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function delete(int $id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "delete from department where department_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function insert(string $department_address, string $department_phone)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into department(department_address, department_phone) values('{$department_address}','{$department_phone}')";
        $dm->connection->query($query);
    }
}