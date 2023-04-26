<?php

use services\CraftiDB;
use services\Template;

class EventsController
{
    public function saveEventRecord($queryParams, $postParams){
        $parentName = $postParams['name'];
        $parentEmail = $postParams['email'];
        $childName = $postParams['child_name'];
        $childDayOfBirthDay = $postParams['date'];
        $eventId = $postParams['event_id'];
        $db = new CraftiDB();
        $parentId = $db->getParentByNameAndEmail($parentName, $parentEmail)['parent_id'];
        if (!$parentId) {
            $db->addNewParentRecord($parentName, $parentEmail);
            $parentId = $db->getParentByNameAndEmail($parentName, $parentEmail)['parent_id'];
        }
        $childId = $db->getChildByNameAndYearAndParentId($childName, $childDayOfBirthDay, $parentId)['child_id'];
        if (!$childId) {
            $db->addNewChildRecord($childName, $childDayOfBirthDay, $parentId);
            $childId = $db->getChildByNameAndYearAndParentId($childName, $childDayOfBirthDay, $parentId)['child_id'];
        }
    }
    public function createEventRecord($queryParams){
        $eventId = $queryParams['id'];
        $eventName = (new CraftiDB())->getEventById($eventId)['event_name'];
        $template = new Template();
        $template->assign('title', 'Запись на событие');
        $template->assign('eventName', $eventName);
        $template->assign('eventId', $eventId);
        $render = $template->render('create_event_record.php');
        $template->assign('main', $render);
        echo $template->render('base.php');
    }
    public function index() {
        echo "Welcome to the events page";
    }
}