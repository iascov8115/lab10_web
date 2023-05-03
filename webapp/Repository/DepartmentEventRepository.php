<?php

namespace Repository;

use Services\DatabaseManager;

class DepartmentEventRepository
{
    public function findOneById($id) {
        $dm = DatabaseManager::getInstance();
        $query = "select *  from department_event where de_id = '{$id}'";
        return $dm->connection->query($query)->fetch_assoc();
    }
    public function findAll(){
        $dm = DatabaseManager::getInstance();
        $query = "select * from department_event";
        return $dm->connection->query($query)->fetch_all();
    }

    public function update(int $id, string $de_date, string $de_time, int $department_id, int $event_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "update department_event set de_date = '{$de_date}', de_time = '{$de_time}', department_id = '{$department_id}', event_id = '{$event_id}' where de_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function delete(int $id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "delete from department_event where de_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function insert(string $de_date, string $de_time, int $department_id, int $event_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into department_event(de_date, de_time, department_id, event_id)  values('{$de_date}','{$de_time}','{$department_id}','{$event_id}')";
        $dm->connection->query($query);
    }

}