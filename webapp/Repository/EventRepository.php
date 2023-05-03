<?php

namespace Repository;

use Services\DatabaseManager;

class EventRepository
{
    public function findOneById($id) {
        $dm = DatabaseManager::getInstance();
        $query = "select *  from event where event_id = '{$id}'";
        return $dm->connection->query($query)->fetch_assoc();
    }
    public function findAllDetailedEvents(): array
    {
        $dm = DatabaseManager::getInstance();
        $query = "select de.de_id, d.department_address, d.department_phone, de.de_date, de.de_time, e.event_name, e.available_places, e.event_price  from event e inner join department_event de on e.event_id = de.event_id inner join department d on de.department_id = d.department_id";
        return $dm->connection->query($query)->fetch_all();
    }
    public function findAll(){
        $dm = DatabaseManager::getInstance();
        $query = "select * from event";
        return $dm->connection->query($query)->fetch_all();
    }

    public function update(int $id, string $event_name, int $manager_id, int $available_places, int $event_price)
    {
        $dm = DatabaseManager::getInstance();
        $query = "update event set event_name = '{$event_name}', manager_id = '{$manager_id}', available_places = '{$available_places}', event_price = '{$event_price}' where event_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function delete(int $id)
    {
        $dm = DatabaseManager::getInstance();
        $query = "delete from event where event_id = '{$id}'";
        $dm->connection->query($query);
    }

    public function insert(string $event_name, int $manager_id, int $available_places, int $event_price)
    {
        $dm = DatabaseManager::getInstance();
        $query = "insert into event(event_name, manager_id, available_places, event_price) values('{$event_name}','{$manager_id}','{$available_places}','{$event_price}')";
        $dm->connection->query($query);
    }

}