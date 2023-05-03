<?php

namespace Repository;

use Services\DatabaseManager;

class EventRecordRepository
{
    public function findOneById($id){
        $dm = DatabaseManager::getInstance();
        $query = "select * from event_record where er_id = '{$id}'";
        return $dm->connection->query($query)->fetch_assoc();
    }
    public function findOneByDepIdChildId(int $de_id,int $child_id){
        $dm = DatabaseManager::getInstance();
        $query = "select * from event_record where de_id = '{$de_id}' and child_id = '{$child_id}'";
        return $dm->connection->query($query)->fetch_assoc();
    }
    public function addNewEventRecord(string $er_date, int $de_id, $child_id){
        $dm = DatabaseManager::getInstance();
        $query = "insert into event_record(er_date, de_id, child_id) values ('{$er_date}', '{$de_id}', '{$child_id}')";
        $dm->connection->query($query);
        return $this->findOneByDepIdChildId($de_id, $child_id);
    }
    public function findAll(){
        $dm = DatabaseManager::getInstance();
        $query = "select * from event_record";
        return $dm->connection->query($query)->fetch_all();
    }

    public function update(int $id, string $er_date, int $de_id, int $child_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "update event_record set er_date = '{$er_date}', de_id = '{$de_id}', child_id = '{$child_id}' where er_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function delete(int $id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "delete from event_record where er_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function insert(string $er_date, int $de_id, int $child_id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into event_record(er_date, de_id, child_id) values('{$er_date}','{$de_id}','{$child_id}')";
        $dm->connection->query($query);
    }
}