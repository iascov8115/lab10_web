<?php

namespace Controllers;

use Repository\ChildRepository;
use Repository\DepartmentEventRepository;
use Repository\EventRecordRepository;
use Repository\EventRepository;
use Repository\ParentRepository;
use Services\Request;
use Services\Template;

class HomeController
{
    public function createNewEventRecord(Request $request)
    {
        $der = new DepartmentEventRepository();
        $er = new EventRepository();
        $params = $request->parameters;

        $template = new Template();

        $de_id = $params['id'];
        $department_event = $der->findOneById($de_id);

        $event_id = $department_event['event_id'];
        $event = $er->findOneById($event_id);

        if (!isset($params['submit'])) {
            $template->assign('de_id', $params['id']);
            $template->assign('eventName', $event['event_name']);
            $template->assign('title', $event['event_name']);
            $template->assign('main', $template->render('event_record_form.php'));
        } else {
            $pr = new ParentRepository();
            $cr = new ChildRepository();
            $er = new EventRecordRepository();

            $parent = $pr->findOneByNameEmail($params['name'], $params['email']);
            if (!$parent) {
                $parent = $pr->add($params['name'], $params['email']);
            }

            $child = $cr->findOneChildByNameYearParent($params['child_name'], $params['date'], $parent['parent_id']);
            if (!$child) {
                $child = $cr->addNewChild($params['child_name'], $params['date'], $parent['parent_id']);
            }

            $er_date = date("Y-m-d");
            $event_record = $er->findOneByDepIdChildId($de_id, $child['child_id']);
            if (!$event_record) {
                $event_record = $er->addNewEventRecord($er_date, $de_id, $child['child_id']);
            }
            $template->assign('main', "<div class='container'><h1 class='message'>Вы были успешно записаны на \"{$event['event_name']}\"!</h1></div>");
            $template->assign('title', "Успех!");
        }
        echo $template->render('base.php');

    }

    public function index(Request $request)
    {
        $template = new Template();
        $events = (new EventRepository())->findAllDetailedEvents();
        $template->assign('title', 'Crafti события');
        $template->assign('main', $template->render('events_list.php', ['events' => $events]));
        echo $template->render('base.php');
    }
}